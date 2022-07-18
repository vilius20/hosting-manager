document.getElementById('login_email').value = getSavedValue('login_email');
document.getElementById('reg_firstname').value = getSavedValue('reg_firstname');
document.getElementById('reg_lastname').value = getSavedValue('reg_lastname');
document.getElementById('reg_email').value = getSavedValue('reg_email');
document.getElementById('reg_country').value = getSavedValue('reg_country');
document.getElementById('reg_city').value = getSavedValue('reg_city');
document.getElementById('reg_address').value = getSavedValue('reg_address');

function saveValue(e) {
  var id = e.id;
  var val = e.value;
  localStorage.setItem(id, val);
}

function getSavedValue(v) {
  if (!localStorage.getItem(v)) {
    return '';
  }
  return localStorage.getItem(v);
}
