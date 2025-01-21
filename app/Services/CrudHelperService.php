<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CrudHelperService
{
    /** @var Model $model */
    public $model;

    /**
     * CrudHelper constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all records with optional conditions and pagination.
     *
     * @param array $conditions
     * @param int|null $perPage
     * @return LengthAwarePaginator|EloquentCollection
     */
    public function all(array $conditions = [], int $perPage = null)
    {
        $query = $this->model->newQuery();

        foreach ($conditions as $key => $value) {
            $query->where($key, $value);
        }

/*        // Ensure pagination only works if $perPage is provided
        if ($perPage !== null) {
            return $query->paginate($perPage);
        }*/

        return $query->get();
    }



    public function get($id)
    {
        $room = $this->model->find($id);

        if (!$room) {
            return response()->json([
                'error' => true,
                'message' => 'Room not found'
            ], 404);
        }

        return response()->json($room);
    }



    /**
     * Create a new record.
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing record.
     *
     * @param mixed $id
     * @param array $data
     * @return Model
     */
    public function update($id, array $data): Model
    {
        $record = $this->model->find($id);
        $record->update($data);
        return $record;
    }

    /**
     * Delete a record by its primary key.
     *
     * @param mixed $id
     * @return bool
     */
    public function delete($id): bool
    {
        $record = $this->get($id);
        return $record->delete();
    }
}
