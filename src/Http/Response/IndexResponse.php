<?php

namespace Esatic\ActiveUser\Http\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexResponse implements Responsable
{

    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * @param Request $request
     * @return Response|void
     */
    public function toResponse($request)
    {
        $query = $this->model->newQuery();
        $fillable = $this->model->getFillable();
        foreach ($fillable as $item) {
            if ($request->has($item)) {
                $query->where($item, 'like', $request->input($item));
            }
        }
        $size = $request->input('size', 20);
        return \response()->json($query->paginate($size));
    }
}
