<?php
use Postmark\PostmarkClient;

class Login extends Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
      $login = $this->model->process();
      echo json_encode($login);
      exit;
    }

    // $this->bodyClass = 'fixed-header';    
    // $this->title = 'Login';
    // $this->noMenu = true;
    // $this->loadPage();
    // $this->render('index');
    // $this->loadFooter();

  }

  public function test() {

    $client = new PostmarkClient("8365f97a-0552-467d-8e4b-6cfac21f4910");

    // Send an email:
    $sendResult = $client->sendEmail(
      "info@ghostly.kitchen",
      "info@ghostly.kitchen",
      "Hello from Postmark!",
      "This is just a friendly 'hello' from your friends at Postmark."
    );


    var_dump($sendResult);
  }

}
?>
