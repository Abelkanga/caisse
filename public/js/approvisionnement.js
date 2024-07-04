//
// document.addEventListener('DOMContentLoaded', (event) => {
//     const modepaieField = document.getElementById('approvisionnement_modepaie');
//     const detailsBanque = document.getElementById('details-banque');
//     const detailsCaisse = document.getElementById('details-caisse');
//     const detailsPret = document.getElementById('details-pret');
//
//     if (!modepaieField) {
//         console.error('Element with ID approvisionnement_modepaie not found.');
//         return;
//     }
//
//     function toggleDetails() {
//         const selectedMode = modepaieField.value;
//         detailsBanque.style.display = 'none';
//         detailsCaisse.style.display = 'none';
//         detailsPret.style.display = 'none';
//
//         if (selectedMode === 'banque') {
//             detailsBanque.style.display = 'block';
//         } else if (selectedMode === 'caisse') {
//             detailsCaisse.style.display = 'block';
//         } else if (selectedMode === 'pret') {
//             detailsPret.style.display = 'block';
//         }
//     }
//
//     modepaieField.addEventListener('change', toggleDetails);
//     toggleDetails(); // Run on page load to set initial state
// });
