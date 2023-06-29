function showMsg(title, msg){
    console.log(title);
    waitingDialog.show(msg,{
        headerText: title,
        headerSize:4,
        contentElement: 'p',
        progressType: 'danger'
    });
}
function hideMsg(){
    waitingDialog.hide();
}
function addEvent(obj, evType, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(evType, fn, false);
        return true;
    } else if (obj.attachEvent) {
        var r = obj.attachEvent("on" + evType, fn);
        return r;
    } else {
        alert("Handler could not be attached");
    }
}