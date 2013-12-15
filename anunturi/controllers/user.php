<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_CONTROLLER
{

    public function logout()
    {
        $this->logoutCurrentUser();
        $this->index();
    }

    public function newUser()
    {
        $this->data['active_page'] = "";
        $this->data['title'] = 'Utilizator nou';
        $this->loadView('new_user_view');
    }

    public function addNewUser()
    {
        $userData = $this->getAddNewUserData();
        if (md5($this->input->post('conf-password')) != $userData['password']) {
            $this->data['error'] = 'Confirmarea parolei nu a fost corecta.';
            $this->newUser();
            return;
        }
        if ($this->user_model->emailExists($userData['email'])) {
            $this->data['error'] = 'Acest email este deja folosit pentru un utilizator.';
            $this->newUser();
            return;
        }
        if ($this->user_model->userExists($userData['username'])) {
            $this->data['error'] = 'Acest nume de utilizator este deja folosit.';
            $this->newUser();
            return;
        }
        $userCount = count($this->user_model->getUserByName($userData['username']));
        if ($userCount == 0) {
            $this->data['error'] = '';
            $userData['user_id'] = $this->user_model->insert($userData);
            $this->loginUser($userData);
            $this->index();
        } else {
            $this->data['error'] = 'Nume de utilizator folosit';
            $this->newUser();
        }
    }

    public function login()
    {
        $this->data['active_page'] = "";
        $this->data['title'] = 'Autentificare';
        $this->loadView('user_login_view');
    }

    public function submitLogin()
    {
        $userData = $this->getUserLoginData();
        $userId = $this->user_model->getUserId($userData);
        if ($userId != 0) {
            $this->data['error'] = "";
            $userData['user_id'] = $userId;
            $this->loginUser($userData);
            $this->index();
        } else {
            $this->data['error'] = "Ati gresiti datele de autentificare.";
            $this->login();
        }
    }

    public function newAdvert()
    {
        if ($this->checkIfUserDataIsSet()) {
            $this->data['active_page'] = "newAdvert";
            $this->data['title'] = "Anunt nou";
            $this->session->set_userdata('advert_guid', uniqid());
            $this->loadView('add_new_advert_view');
        } else {
            $this->data['error'] = 'Va rugam sa va autentificati pentru a post un anunt.';
            $this->login();
        }
    }

    private function loginUser($userData)
    {
        $this->session->set_userdata('username', $userData['username']);
        $this->session->set_userdata('user_id', $userData['user_id']);
        $this->session->set_userdata('is_logged', TRUE);
    }

    private function getAddNewUserData()
    {
        return array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'email' => $this->input->post('email'),
            'fullname' => $this->input->post('fullname'),
            'city' => $this->input->post('city'),
            'district' => $this->input->post('district'),
            // TODO: Regex for phone.
            'phone' => $this->input->post('phone')
        );
    }

    private function getUserLoginData()
    {
        return array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );
    }
}