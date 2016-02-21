<?php namespace CodeMRC\Transformers;

use CodeMRC\Entities\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['projects'];

    public function transform(Client $client)
    {
        return [
            "id"            => $client->id,
            "name"          => $client->name,
            "responsible"   => $client->responsible,
            "email"         => $client->email,
            "phone"         => $client->phone,
            "address"       => $client->address,
            "observation"   => $client->observation,
            "created_at"    => $client->created_at,
            "updated_at"    => $client->updated_at,
        ];
    }
    public function includeProjects(Client $client)
    {
        return $this->collection($client->project, new ProjectTransformer());
    }
}