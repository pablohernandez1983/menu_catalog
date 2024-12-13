<?php

namespace App\Controllers;

use App\Controller;
use App\Services\DebugService;
use App\Services\MenuService;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $menu_model = new Menu();
        $all_menu = $menu_model->get_all_ordered();

        $message = isset($_GET['message']) ? $_GET['message']: null;
        $message_update = isset($_GET['message_update']) ? $_GET['message_update']: null;
        $message_delete = isset($_GET['message_delete']) ? $_GET['message_delete']: null;

        $this->render('index', ['list' => $all_menu, 'message'=>$message, 'message_update'=>$message_update, 'message_delete'=>$message_delete]);
    }

    public function menu()
    {
        $menu_model = new Menu();
        $all_menu = $menu_model->get_all();

        $menu_service = new MenuService();        
        $html = $menu_service->html($all_menu);

        $this->render('index', ['menu' => $html]);
    }

    public function description()
    {
        $menu_id = $_GET['id'];
        if (!empty($menu_id)) {
            $menu_model = new Menu();
            $all_menu = $menu_model->get_by_id($menu_id);
            if (isset($all_menu)) {
                echo $all_menu[0]['description'];
            }
        }
    }

    public function new()
    {
        $menu_model = new Menu();
        $all_menu = $menu_model->get_all_ordered();
        $this->render('index', ['new' => true, 'all_menu'=>$all_menu]);
    }

    public function store()
    {
        $menu_id = isset($_POST['menu'])?$_POST['menu'] : 0;
        $name    = isset($_POST['name'])? $_POST['name'] : null;
        $description = isset($_POST['description'])?$_POST['description']:null;

        $data = [
            'name'=>$name,
            'description'=>$description,
            'parent_id'=>$menu_id,
            'created_at'=>date('Y-m-d H:i:s'),
        ];
        $menu_model = new Menu();
        $menu_model->store($data);

        $this->render('index', ['store'=>true]);
    }

    public function edit()
    {
        $menu_id = $_GET['id'];
        $menu_model = new Menu();
        $menu = $menu_model->get_by_id($menu_id);
        $all_menu = $menu_model->get_all_ordered();

        $this->render('index', ['menu_id' => $menu_id, 'edit' => $menu, 'all_menu' => $all_menu]);
    }

    public function update()
    {
        $menu_id_edit = $_POST['menu_id'];
        $menu_id = $_POST['menu'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $data = [
            'id'=>$menu_id_edit,
            'name'=>$name,
            'description'=>$description,
            'parent_id'=>$menu_id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        $menu_model = new Menu();
        $menu_model->update($data);
        $this->render('index', ['update'=>true]);
    }

    public function delete()
    {
        $menu_id = $_POST['id'];
        if (!empty($menu_id)) {
            $menu_model = new Menu();
            $menu_model->delete($menu_id);
        }
    }
}
