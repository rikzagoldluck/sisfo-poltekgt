let installEvent = null;
// let installButton = document.getElementById("install");
let enableButton = document.getElementById("enable");

enableButton.addEventListener("click", function() {
	this.disabled = true;
	startPwa(true);
});

if(localStorage.getItem('pwa') === 'true') {
	startPwa();
}

function startPwa(firstStart) {
	localStorage.setItem('pwa', 'true');

	if(firstStart) {
		location.reload();
	}

	window.addEventListener("load", () => {
        
		navigator.serviceWorker.register("/sw.js")
		.then(registration => {
			console.log("Service Worker is registered", registration);
			enableButton.parentNode.remove();
		})
		.catch(err => {
			console.error("Registration failed:", err);
		}); 

		
	});

	window.addEventListener("beforeinstallprompt", (e) => {
		e.preventDefault();
		console.log("Ready to install...");
		// installEvent = e;
		// document.getElementById("install").style.display = "initial";
        setTimeout(() => {
            Swal.fire({
                title: 'Apakah anda ingin menginstall aplikasi ini?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Ya',
              }).then((result) => {
                if (result.isConfirmed) {
                  e.prompt()
                }
              })
        }, 3000);
	});

	// setTimeout(cacheLinks, 500);

	// if(installButton) {
	// 	installButton.addEventListener("click", function() {
	// 		installEvent.prompt();
	// 	});
	// }
}

