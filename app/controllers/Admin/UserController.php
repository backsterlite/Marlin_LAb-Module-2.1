<?php


namespace App\controllers\Admin;


use App\models\ImageManager;
use App\models\Role;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class UserController extends Controller
{

    private $manager;
    private $role;

    public function __construct( ImageManager $manager, Role $role)
    {
        parent::__construct();
        $this->manager = $manager;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->database->allASC('users');
        echo $this->view->render('Admin/user/index', compact('users'));
    }
    public function create()
    {
        echo $this->view->render('Admin/user/create');
    }
    public function store()
    {
        try{
            $file = $this->manager->verificationImage($_FILES['image']);
        }catch (\Exception $e)
        {
            flash()->error($e->getMessage());
            back();
            exit;
        }
        if($file) {
            if($this->validate())
            {
                try {
                    $userId = $this->auth->admin()->createUser($_POST['email'], $_POST['password'], $_POST['username']);
                    try{
                        $this->database->update('users', ['image' => $file], 'id', $userId);
                    }catch (\Exception $e)
                    {
                        flash()->error('Операция не удалась. Пожалуйста попробуйте позже');
                        back();
                        exit;
                    }

                    $this->manager->add($_FILES['image'], 'user', $file);

                    try {
                        $this->auth->admin()->addRoleForUserById($userId, $_POST['role']);
                    }
                    catch (\Delight\Auth\UnknownIdException $e) {
                        die('Unknown user ID');
                    }
                    flash()->success('Новый  пользователь создан с ID: ' . $userId) ;
                    back();
                    exit;
                }
                catch (\Delight\Auth\InvalidEmailException $e) {
                    flash()->error('Invalid email address');
                    back();
                    exit;
                }
                catch (\Delight\Auth\InvalidPasswordException $e) {
                    flash()->error('Invalid password');
                    back();
                    exit;
                }
                catch (\Delight\Auth\UserAlreadyExistsException $e) {
                    flash()->error('User already exists');
                    back();
                    exit;
                }
            }
        }
        if($this->validate())
        {
            try {
                $userId = $this->auth->admin()->createUser($_POST['email'], $_POST['password'], $_POST['username']);

                try {
                    $this->auth->admin()->addRoleForUserById($userId, $_POST['role']);
                }
                catch (\Delight\Auth\UnknownIdException $e) {
                    die('Unknown user ID');
                }
                flash()->success('Новый  пользователь создан с ID: ' . $userId) ;
                back();
                exit;
            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                flash()->error('Invalid email address');
                back();
                exit;
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                flash()->error('Invalid password');
                back();
                exit;
            }
            catch (\Delight\Auth\UserAlreadyExistsException $e) {
                flash()->error('User already exists');
                back();
                exit;
            }
        }

    }
    public function edit($id)
    {

        $user = $this->database->find('users', 'id', $id);
        echo $this->view->render('Admin/user/edit', compact('user'));
    }

    public function update($id)
    {
        if($this->role->isAdmin())
        {
            if($this->role->changeRole($_POST['current-role'], $_POST['new-role'], $id))
            {
                flash()->success('Изминения приняты');
                back();
                exit;
            }
            flash()->error('Операция провалилась. Попробуйте позже');
            back();
            exit;
        }

        flash()->error('У ВАС не достаточно прав');
        back();
        exit;
    }

    public function changeStatus($id)
    {
        if($_GET['status'] == '2')
        {
            try{
                $this->database->update('users', ['status' =>2], 'id', $id);
            }catch(\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }

        }else if($_GET['status'] == '0')
        {
            try{
                $this->database->update('users', ['status' => 0], 'id', $id);
            }catch(\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }
        }
        flash()->success('Изменения приняты');
        back();
        exit;
    }

    private function validate()
    {
        $validator = v::key('username', v::stringType()->notEmpty())
            ->key('email', v::email())
            ->key('password', v::stringType()->notEmpty())
            ->key('role', v::stringType()->notEmpty());

        try {
            return $validator->assert($_POST);

        } catch (ValidationException $exception) {
            $exception->findMessages($this->getMessages());
            flash()->error($exception->getMessages());
            back();
            exit;
        }
    }
    private function getMessages()
    {
        return [
            'username' => 'Введите имя',
            'email' => 'Неверный формат e-mail',
            'password'  =>  'Введите пароль',
            'role'  =>  'Выберите роль'
        ];
    }

}