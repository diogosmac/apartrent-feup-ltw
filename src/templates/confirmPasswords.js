var checkMatch = function() {
    if (document.getElementById('password').value == document.getElementById('confirm_password').value) 
    {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Passwords matching';

      return true;
    } 
    else 
    {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Passwords not matching';

      return false;
    }
}