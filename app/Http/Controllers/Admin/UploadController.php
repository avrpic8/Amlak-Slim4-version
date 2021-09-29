<?php

namespace App\Http\Controllers\Admin;


use http\Exception\RuntimeException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\UploadedFileInterface;
use App\Http\Services\FilenameFilter;

class UploadController
{
    private $tempDirectory = __DIR__ . '/../../../../tmp/upload';

    private $storageDirectory = __DIR__ . '/../../../../storage';


    public function store(Request $request, Response $response, array $args): Response{

        $uploadedFiles = ($request->getUploadedFiles()['avatar'] ?? []);

        if ($uploadedFiles) {
            return $this->moveTemporaryUploadedFile($uploadedFiles, $response);
        }

        return $response;
    }

    private function moveTemporaryUploadedFile($uploadedFiles, Response $response): Response
    {
        $fileIdentifier = '';


        $fileIdentifier = $this->moveUploadedFile($this->tempDirectory, $uploadedFiles);

        // Server returns unique location id in text/plain response
        $response = $response->withHeader('Content-Type', 'text/plain');
        $response->getBody()->write($fileIdentifier);

        return $response;
    }

    private function storeUploadedFiles(array $submittedIds, Response $response): Response
    {
        foreach ($submittedIds as $submittedId) {
            // Save the file into the file storage
            $submittedId = FilenameFilter::createSafeFilename($submittedId);
            $sourceFile = sprintf('%s/%s', $this->tempDirectory, $submittedId);
            $targetFile = sprintf('%s/%s', $this->storageDirectory, $submittedId);

            if (!copy($sourceFile, $targetFile)) {
                throw new RuntimeException(
                    sprintf('Error moving uploaded file %s to the storage', $submittedId)
                );
            }

            if (!unlink($sourceFile)) {
                throw new RuntimeException(
                    sprintf('Error removing uploaded file %s', $submittedId)
                );
            }
        }

        // Server returns unique location id in text/plain response
        $response = $response->withHeader('Content-Type', 'text/plain');

        return $response->withStatus(201);
    }

    private function moveUploadedFile(string $directory, UploadedFileInterface $uploadedFile): string
    {

        $extension = (string)pathinfo(
            $uploadedFile->getClientFilename(),
            PATHINFO_EXTENSION
        );

        // Create unique id for this file
        $filename = FilenameFilter::createSafeFilename(
            sprintf('%s.%s', (string) uuid_create(), $extension)
        );

        // Save the file into the storage
        $targetPath = sprintf('%s/%s', $directory, $filename);
        $uploadedFile->moveTo($targetPath);

        return $filename;
    }


}