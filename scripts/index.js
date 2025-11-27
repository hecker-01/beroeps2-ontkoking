const themeSwitch = document.getElementById('theme-switch');
const body = document.body;

if (themeSwitch) {
  if (localStorage.getItem('theme') === 'light') {
    body.classList.add('light-mode');
    themeSwitch.checked = true;
  }

  themeSwitch.addEventListener('change', () => {
    if (themeSwitch.checked) {
      body.classList.add('light-mode');
      localStorage.setItem('theme', 'light');
    } else {
      body.classList.remove('light-mode');
      localStorage.setItem('theme', 'dark');
    }
  });
}
