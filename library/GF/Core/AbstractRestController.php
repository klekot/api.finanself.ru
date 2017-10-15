<?php
/**
 * Created by PhpStorm.
 * User: klekot
 * Date: 14.10.2017
 * Time: 22:32
 */

namespace GF\Core;

class AbstractRestController extends AbstractController
{
    public function indexAction()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->show($data = null);
                break;
            case 'POST':
                $this->create($data = null);
                break;
            case 'PUT':
                $this->update($data = null);
                break;
            case 'DELETE':
                $this->destroy($data = null);
                break;
        }
    }

    protected function show($data)
    {
        $this->_responseWithJson($data);
    }

    protected function create($data)
    {
        $this->_responseWithJson($data);
    }

    protected function update($data)
    {
        $this->_responseWithJson($data);
    }

    protected function destroy($data)
    {
        $this->_responseWithJson($data);
    }

    protected function getProperties($model)
    {
        $data = array();
        $properties = array_keys($model->attributes());
        foreach ($properties as $property) {
            $data[$property] = $model->$property;
        }
        return $data;
    }

    private function _responseWithJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}