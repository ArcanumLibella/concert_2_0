// export default class Header {
//   constructor () {
//     let header = document.querySelector('.header')
//     if (!header) return

//     this.manageHeader(header)
//   }

//   manageHeader (header) {
//     window.addEventListener('scroll', event => {
//       const offsetWindow = window.pageYOffset
//       const headerHeight = 60

//       if (offsetWindow > headerHeight) {
//         header.classList.add('sticky-menu')
//       } else {
//         header.classList.remove('sticky-menu')
//       }
//     })
//   }
// }
