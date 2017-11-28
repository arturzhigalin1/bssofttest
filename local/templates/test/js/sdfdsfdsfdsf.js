function criteoCodeCallback() {
    window.criteo_q = window.criteo_q || [];

    var randomNumber = Math.floor((Math.random() * 10000) + 1);
    var day = new Date();
    var time = day.getTime();
    var productId = randomNumber + time;

    var deviceType = /iPad/.test(navigator.userAgent)?"t":/webOS|Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Silk/.test(navigator.userAgent)?"m":"d";

    window.criteo_q.push(
        { event: "setAccount", account: 42580 },
        { event: "setEmail", email: "" },
        { event: "setSiteType", type: deviceType },
        { event: "trackTransaction", ecpplugin: "1cbitrix", id: productId, item: [
            { id: "1", price: 1, quantity: 1 },
        ]});
}