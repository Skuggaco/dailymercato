<link rel="manifest" href="/manifest.json">
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
<script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(["init", {
        appId: "5a61b4ac-c82c-4a79-8854-6f24a17513de",
        autoRegister: true,
        notifyButton: {
            enable: false /* Set to false to hide */
        },
        welcomeNotification: {
            "title": "Bienvenue sur dailymercato",
            "message": "Merci de votre abonnement",
            // "url": "" /* Leave commented for the notification to not open a window on Chrome and Firefox (on Safari, it opens to your webpage) */
        }
    }]);
</script>