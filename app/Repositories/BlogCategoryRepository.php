<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */

class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     *  get model is edit in admin
     *
     * @param   INT $id
     *
     * @return Model
     */
    public function getEdit(int $id): Model
    {
        return $this->startConditions()->find($id);
    }

    /**
     *  get model item this paginate
     * @param int|null $item
     * @return mixed
     */
    public function getAllWithPaginate(int $item = null)
    {
        $fields = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()
            ->select($fields)
            ->paginate($item);

        return $result;
    }

    /**
     *  get combobox list category
     * @return Collection
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS title'
        ]);

        //$this->startConditions()->all();

        $result = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }
}
