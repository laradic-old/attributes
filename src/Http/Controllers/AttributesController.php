<?php namespace LaradicAdmin\Attributes\Http\Controllers;

use App\Http\Requests;
use Datatable;
use Laradic\Admin\Http\Controllers\Controller;
use LaradicAdmin\Attributes\FieldTypes\Factory;
use LaradicAdmin\Attributes\Models\Attribute;
use LaradicAdmin\Attributes\Repositories\EloquentAttributeRepository;
use Response;

class AttributeController extends Controller
{

    protected $repository;

    protected $factory;

    public function __construct(Factory $factory, EloquentAttributeRepository $repository)
    {
        $this->factory = $factory;
        $this->repository = $repository;
    }


    public function getDatatable()
    {
        /** @var \Chumper\Datatable\Engines\BaseEngine $collection */
        $collection = Datatable::collection(
            Attribute::all([ 'id', 'slug', 'label', 'field_type', 'description', 'enabled' ])
        );

        return $collection
            ->showColumns('id', 'slug', 'label', 'field_type', 'description', 'enabled')
            ->searchColumns('slug', 'label', 'description')
            ->orderColumns('id', 'slug', 'label', 'field_type', 'description', 'enabled')
            ->setAliasMapping()
            ->make();
        /*
        return $collection
            ->addColumn('id', function($model){ return $model->id; })
            ->addColumn('slug', function($model){ return $model->slug; })
            ->addColumn('field_type', function($model){ return $model->field_type; })
            ->addColumn('enabled', function($model){ return $model->enabled; })
            ->addColumn('label', function($model){ return $model->label; })
            ->addColumn('description', function($model){ return $model->description; })
            ->make();
        */
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('laradic/admin::attributes.index')->with(
            [
                'fieldTypes' => $this->factory
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $attribute = $this->repository->getById($id);

        return Response::json($attribute);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
