<?php

namespace JardinDeVicky\NovaFileManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JardinDeVicky\NovaFileManager\Http\Services\FileManagerService;
use Laravel\Nova\Http\Requests\NovaRequest;

class FileManagerToolController extends Controller
{
    protected FileManagerService $service;

    public function __construct(FileManagerService $fileManagerService)
    {
        $this->service = $fileManagerService;
    }

    public function getData(Request $request)
    {
        return $this->service->ajaxGetFilesAndFolders($request);
    }

    public function getDataField($resource, $attribute, NovaRequest $request)
    {
        return $this->service->ajaxGetFilesAndFolders($request);
    }

    public function createFolder(Request $request)
    {
        return $this->service->createFolderOnPath($request->folder, $request->current);
    }

    public function deleteFolder(Request $request)
    {
        return $this->service->deleteDirectory($request->current);
    }

    public function upload(Request $request)
    {
        $uploadingFolder = $request->folder ?? false;

        return $this->service->uploadFile(
            $request->file,
            $request->current ?? '',
            $request->visibility,
            $uploadingFolder,
            $request->rules ? $this->getRules($request->rules) : []
        );
    }

    public function move(Request $request)
    {
        return $this->service->moveFile($request->old, $request->path);
    }

    public function getInfo(Request $request)
    {
        return $this->service->getFileInfo($request->file);
    }

    public function removeFile(Request $request)
    {
        return $this->service->removeFile($request->file, $request->type);
    }

    public function renameFile(Request $request)
    {
        return $this->service->renameFile($request->file, $request->name);
    }

    public function downloadFile(Request $request)
    {
        return $this->service->downloadFile($request->file);
    }

    public function rename(Request $request)
    {
        return $this->service->renameFile($request->path, $request->name);
    }

    public function folderUploadedEvent(Request $request)
    {
        return $this->service->folderUploadedEvent($request->path);
    }

    private function getRules(string $rules): array
    {
        return json_decode($rules);
    }
}
