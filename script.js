window.setTimeout("tampilWaktu()", 1000);

function tampilWaktu() {
    var waktu = new Date();
    var bulan = waktu.getMonth() + 1;

    setTimeout("tampilWaktu()", 1000);
    document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
    document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
}


document.addEventListener("DOMContentLoaded", () => {
  const darkIcon = document.getElementById('dark-mode');
  const lightIcon = document.getElementById('light-mode');

  // DARK MODE
  darkIcon.addEventListener('click', () => {
    console.log("Dark Mode clicked!");

    // HERO
    const sectionHero = document.getElementById('hero');
    sectionHero.classList.remove('bg-danger-subtle');
    sectionHero.classList.add('bg-dark-subtle');

    // ARTICLE
    const bgArticle = document.getElementById('article');
    bgArticle.classList.remove('bg-light', 'bg-secondary-subtle');
    bgArticle.classList.add('bg-dark', 'text-light');

    // GALLERY
    const bgGallery = document.getElementById('gallery');
    bgGallery.classList.remove('bg-danger-subtle');
    bgGallery.classList.add('bg-dark-subtle');

    // FOOTER
    const footer = document.querySelector('footer');
    footer.classList.add('bg-dark', 'text-light');

    // ICONS FOOTER
    document.querySelectorAll('.icons').forEach(icon => {
      icon.classList.remove('text-dark');
      icon.classList.add('text-light');
    });
  });

  // LIGHT MODE
  lightIcon.addEventListener('click', () => {
    console.log("Light Mode clicked!");

    // HERO
    const sectionHero = document.getElementById('hero');
    sectionHero.classList.remove('bg-body-tertiary');
    sectionHero.classList.add('bg-danger-subtle');

    // ARTICLE
    const bgArticle = document.getElementById('article');
    bgArticle.classList.remove('bg-dark', 'text-light');
    bgArticle.classList.add('bg-light');

    // GALLERY
    const bgGallery = document.getElementById('gallery');
    bgGallery.classList.remove('bg-dark-subtle');
    bgGallery.classList.add('bg-danger-subtle');

    // FOOTER
    const footer = document.querySelector('footer');
    footer.classList.remove('bg-dark', 'text-light');

    // ICONS FOOTER
    document.querySelectorAll('.icons').forEach(icon => {
      icon.classList.remove('text-light');
      icon.classList.add('text-dark');
    });
  });
});
