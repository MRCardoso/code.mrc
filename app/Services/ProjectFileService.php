<?php
namespace CodeMRC\Services;

use CodeMRC\Repositories\ProjectFileRepository;
use CodeMRC\Repositories\ProjectRepository;
use CodeMRC\Validators\ProjectFileValidator;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectFileService extends Service
{
    protected $projectRepository;
    private $fileSystem;
    private $storage;

    public function __construct(ProjectRepository $projectRepository,
                                ProjectFileRepository $repository,
                                ProjectFileValidator $validator,
                                Filesystem $fileSystem,
                                Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->projectRepository = $projectRepository;
        $this->storage = $storage;
        $this->fileSystem = $fileSystem;
    }

    public function createFile(Array $data, $project_id)
    {
        try{
            $this->validator->with($data)->passesOrFail();

            $file = $data['file'];
            $extension = $file->getClientOriginalExtension();
            $data['extension'] = $extension;

            $project = $this->projectRepository->skipPresenter()->find($project_id);
            $result = $project->files()->create($data);

            $uploaded = $this->storage->put($result->id.".".$data['extension'], $this->fileSystem->get($data['file']));
            if( $uploaded )
                return $result;
            else
                return response()->json("falha ao upar o arquivo",400);
        } catch(ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    public function destroyFile($project_id, $id)
    {
        $response = [
            400,
            "status" => false,
            "message" => "falha ao remover arquivo"
        ];
        $file = $this->repository->skipPresenter()->findWhere(['project_id' => $project_id, 'id'=>$id]);

        if( count($file) > 0 )
        {
            $fileName = $file[0]->id.'.'.$file[0]->extension;

            if( $this->storage->has($fileName) )
                $this->storage->delete($fileName);

            if( $file[0]->delete($id) )
            {
                $response = [
                    200,
                    "status" => true,
                    "message" => "Arquivo removido com sucesso"
                ];
            }
        }
        return response()->json($response, $response[0]);
    }
}