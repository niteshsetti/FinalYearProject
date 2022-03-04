const voi=(voice)=>{
let utter = new SpeechSynthesisUtterance();
utter.lang = 'en-IN';
utter.text = voice;
utter.volume = 1.0;
window.speechSynthesis.speak(utter);
}