<?php

namespace App\Repositories;

use App\Models\Year;

class YearsRepository implements YearsRepositoryInterface
{
    private Year $year;

    public function __construct(Year $year)
    {
        $this->year = $year;
    }


    public function get()
    {
        return $this->year->paginate(10);
    }

    public function show($id)
    {
        return $this->year->find($id);
    }

    public function store($data)
    {
        return $this->year->create($data);
    }

    public function update($id, $data)
    {
        return $this->show($id)->update($data);
    }



    public function delete($id)
    {
        return $this->show($id)->delete();
    }


}
