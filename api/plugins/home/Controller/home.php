<?php
use Postmark\PostmarkClient;

class Home extends Controller {

  function __construct() {
    parent::__construct();
    global $eqDb;
    $this->eqDb = $eqDb;
  }

  public function index() {

    if(!empty($_POST['email']) && !empty($_POST['kitchen'])) {

      $email = $this->eqDb->escape($_POST['email']);

      $this->eqDb->where('email', $email);
      $check = $this->eqDb->get('leads', null, [
        'id',
        'email',
      ]);

      if($check) {
        echo json_encode([
          'r' => 'fail',
          'message' => 'Whoops! Looks like you have already signed up with us!'
        ]);
        exit;
      }

      $create = $this->eqDb->insert('leads', [
        'email' => $email,
        'kitchen' => $kitchen
      ]);

      if($create) {
        echo json_encode([
          'r' => 'success',
          'message' => 'Thank you for joining us.  We will contact you soon!'
        ]);
      }
    }
    
  }

}

?>