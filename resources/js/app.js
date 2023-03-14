import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


/* ZOOM IMAGE */
// // Récupération des images
// const images = document.querySelectorAll('.clickable-image');

// // Ecouteur d'événements pour chaque image
// images.forEach(image => {
//     image.addEventListener('click', function() {
//         const parent_zoomed_img = document.querySelectorAll('.parent_zoomed_img');
//         parent_zoomed_img.forEach(element => {
//             element.classList.add('parent_zoomed_img_show');
//         });

//         // Récupération de l'image agrandie
//         const fullImage = document.createElement('img');
//         fullImage.src = image.src;
//         fullImage.classList.add('zoom_image');
//         // Ajout de l'image agrandie à l'élément parent
//         const parent = image.parentElement.parentElement.parentElement;
//         parent.appendChild(fullImage);

//         // Ajout d'un écouteur d'événements pour réduire l'image
//         fullImage.addEventListener('click', function() {
//             fullImage.classList.add('hidden');
//             fullImage.remove();
//         });
//     });
// });

