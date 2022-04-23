//menentukan versi dari website
// this.version = "V6.0.10";
// console.log("PWA-Service Worker: " + this.version +
//     " - Ready to do the work");

// //import libaries workbox versi 4.3.1 
// importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

// //membuat asset-cache
// workbox.routing.registerRoute(
//     /\.(?:css|js)$/,
//     new workbox.strategies.StaleWhileRevalidate({
//         "cacheName": "assets-cache",
//         plugins: [
//             new workbox.expiration.Plugin({
//                 maxEntries: 50,
//                 maxAgeSeconds: 7 * 24 * 60 * 60
//             }),
//             new workbox.cacheableResponse.Plugin({
//                 statuses: [200]
//             })
//         ]
//     })

// );

// //membuat html-cache
// workbox.routing.registerRoute(
//     /\.html/,
//     new workbox.strategies.StaleWhileRevalidate({
//         cacheName: 'html-cache',
//         plugins: [
//             new workbox.expiration.Plugin({
//                 maxEntries: 50,
//                 maxAgeSeconds: 7 * 24 * 60 * 60
//             }),
//             new workbox.cacheableResponse.Plugin({
//                 statuses: [200]
//             })
//         ]
//     })
// );

// //membuat asset image-cache
// workbox.routing.registerRoute(
//     /\.(?:png|jpg|jpeg|svg|gif|ico)$/,
//     new workbox.strategies.StaleWhileRevalidate({
//         "cacheName": "images-cache",
//         plugins: [
//             new workbox.expiration.Plugin({
//                 maxEntries: 50,
//                 maxAgeSeconds: 7 * 24 * 60 * 60
//             }),
//             new workbox.cacheableResponse.Plugin({
//                 statuses: [200]
//             })
//         ]
//     })
// );

// //membuat asset fonts-cache
// workbox.routing.registerRoute(
//     ({ url }) => url.origin === 'https://fonts.googleapis.com' || url.origin === 'https:fonts.gstatic.com',
//     new workbox.strategies.NetworkFirst({
//         "cacheName": "fonts-cache",
//         plugins: [
//             new workbox.expiration.Plugin({
//                 maxEntries: 50,
//                 maxAgeSeconds: 7 * 24 * 60 * 60
//             }),
//             new workbox.cacheableResponse.Plugin({
//                 statuses: [200]
//             })
//         ]
//     })
// );


// // top-level routes we want to precache
// // referensi:https://shareurcodes.com/blog/how-to-easily-convert-your-existing-laravel-application-into-a-progressive-web-app-by-using-workbox 
// workbox.precaching.precacheAndRoute([]);

// const networkFirstHandler = new workbox.strategies.NetworkFirst({
//     cacheName: 'dynamic-page-cache',
//     plugins: [
//         new workbox.expiration.Plugin({
//             maxEntries: 50
//         }),
//         new workbox.cacheableResponse.Plugin({
//             statuses: [200]
//         })
//     ]
// });

// const FALLBACK_URL = workbox.precaching.getCacheKeyForURL('/offline.html');
// const matcher = ({ event }) => event.request.mode === 'navigate';
// const handler = args =>
//     networkFirstHandler
//     .handle(args)
//     .then(response => response || caches.match(FALLBACK_URL))
//     .catch(() => caches.match(FALLBACK_URL));

// workbox.routing.registerRoute(matcher, handler);

// // var CACHE_NAME = 'my-site-cache';
// // var urlsToCache = [
// //     '/',
// //     '/index.php',
// //     '/load.gif',
// //     '/manifest.json',
// //     '/tenor.gif',
// //     '/offline.html',
// //     'scripts/main.js'
// // ];

// // //menginstall service workor
// // self.addEventListener('install', function(event) {
// //     // Perform install steps
// //   event.waitUntil(
// //     caches.open(CACHE_NAME)
// //       .then(function(cache) {
// //         console.log('Opened cache');
// //         return cache.addAll(urlsToCache);
// //       })
// //   );
// // });

// self.addEventListener('fetch', (event) => {
//     console.log('Fetch intercepted for:', event.request.url);
//     event.respondWith(
//         caches.match(event.request).then((cachedResponse) => {
//             if (cachedResponse) {
//                 return cachedResponse;
//             }
//             return fetch(event.request);
//         })
//     );
// });


// self.addEventListener('install', (event) => {
//     console.log('Service worker install!');

//     const asynInstall = new Promise(function(resolve) {
//         console.log('Waiting install to finish...');
//         setTimeout(resolve, 1000);
//     });
//     event.waitUntil(asynInstall);
// });

// self.addEventListener('activate', (event) => {
//     console.log('Service worker activate!');
// });

// //skipwaiting
// self.addEventListener('message', (event) => {
//     if (event.data && event.data.type === 'SKIP_WAITING') {
//         self.skipWaiting();
//     }
// });

//sharing file
// self.addEventListener('fetch', event => {

//     const url = new URL(event.request.url);

//     if (
//         url.origin === location.origin &&
//         url.pathname === './users/index/add/set_field_upload' &&
//         event.request.method == 'POST') {
//         handleFileShare(event);
//     }

// });


//push Notif
// self.addEventListener('push', event => {
//     console.log('[Service Worker] Push Received.');
//     console.log('[Service Worker] Push had this data:' + event.data.text());

//     const title = 'PWA Dashboard';
//     const options = {
//         body: event.data.text(),
//         icon: 'assets/images/icon.png',
//         badge: 'assets/images/badge.png'
//     };

//     const notificationPromise = self.registration.showNotification(title, options);
//     event.waitUntil(notificationPromise);
// });

// self.addEventListener('notificationclick', function(event) {
//     console.log('[Service Worker] Notification click Received.');

//     event.notification.close();

//     event.waitUntil(
//         clients.openWindow('https://fadil.website/')
//     );
// });

self.addEventListener("install", function(event) {
	event.waitUntil(
		caches.open("pwa").then(function(cache) {
			return cache.addAll([
				"/",
				"/script.js",
				"/img/"
			]);
		})
	);
});

self.addEventListener("fetch", function(event) {
	event.respondWith(
		caches.open("pwa").then(function(cache) {
			// event.respondWith(
			//   fetch(event.request).catch(function() {
			// 	return caches.match(event.request);
			//   })
			// );
            // event.respondWith(
            //     caches.match(event.request).then(function (response) {
            //         return response || fetch(event.request);
            //     })
            // )
			return cache.match(event.request).then(function(response) {
				cache.addAll([event.request.url]);

				if(response) {
					return response;
				}

				return fetch(event.request);
			});
		})
	)
})

// var cacheName = 'hello-pwa';
// var filesToCache = [
//   '/',;
//   '/index.html',
//   '/css/style.css',
//   '/js/main.js'
// ];

// /* Start the service worker and cache all of the app's content */
// self.addEventListener('install', function(e) {
//   e.waitUntil(
//     caches.open(cacheName).then(function(cache) {
//       return cache.addAll(filesToCache);
//     })
//   );
// });

// /* Serve cached content when offline */
// self.addEventListener('fetch', function(e) {
//   e.respondWith(
//     caches.match(e.request).then(function(response) {
//       return response || fetch(e.request);
//     })
//   );
// });