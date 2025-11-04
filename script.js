window.setTimeout("tampilWaktu()", 1000);

function tampilWaktu() {
    var waktu = new Date();
    var bulan = waktu.getMonth() + 1;

    setTimeout("tampilWaktu()", 1000);
    document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
    document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
}


document.addEventListener("DOMContentLoaded", () => {
  // ambil elemet lewat id='dark-mode'
  const darkIcon = document.getElementById('dark-mode');
  // ambil elemet lewat id='light-mode'
  const lightIcon = document.getElementById('light-mode');

  // Darkmode pake evenListener
  darkIcon.addEventListener('click', () => {
    // ini hanya keperluan untuk debug saja
    console.log("Dark Mode clicked!");

    // ini darkmode di bagian "HERO"
    const sectionHero = document.getElementById('hero');
    sectionHero.classList.remove('bg-danger-subtle');
    sectionHero.classList.add('bg-dark-subtle');

    // ini darkmode di bagian "ARTICLE"
    const bgArticle = document.getElementById('article');
    bgArticle.classList.remove('bg-light', 'bg-secondary-subtle');
    bgArticle.classList.add('bg-dark', 'text-light');

    // ini darkmode di bagian "GALLERY"
    const bgGallery = document.getElementById('gallery');
    bgGallery.classList.remove('bg-danger-subtle');
    bgGallery.classList.add('bg-dark-subtle');

    // ini darkmode di bagian "SCHEDULE"
    const schedule = document.getElementById('schedule');
    schedule.classList.add('bg-dark-subtle');

    // ini darkmode di bagian "FOOTER"
    const footer = document.querySelector('footer');
    footer.classList.add('bg-dark', 'text-light');

    // ini darkmode di bagian "ICONS FOOTER"
    document.querySelectorAll('.icons').forEach(icon => {
      icon.classList.remove('text-dark');
      icon.classList.add('text-light');
    });
  });

  // ini untuk LIGHT MODE
  lightIcon.addEventListener('click', () => {
    console.log("Light Mode clicked!");

    // HERO
    const sectionHero = document.getElementById('hero');
    /*
      pada bagian ini saya mendapat suatu anomali yaitu setelah saya
      klik dark mode dan kembali ke light mode, backgroun di hero ndak mau berubah menjadi 
      pink lagi. Ternyata saya belum remove class sebelumnya
    */
    sectionHero.classList.remove('bg-dark-subtle');
    sectionHero.classList.add('bg-danger-subtle');

    // ARTICLE
    const bgArticle = document.getElementById('article');
    bgArticle.classList.remove('bg-dark', 'text-light');
    bgArticle.classList.add('bg-light');

    // GALLERY
    const bgGallery = document.getElementById('gallery');
    bgGallery.classList.remove('bg-dark-subtle');
    bgGallery.classList.add('bg-danger-subtle');

    // light mode untuk "SCHEDULE"
    const schedule = document.getElementById('schedule');
    schedule.classList.remove('bg-dark-subtle');

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
