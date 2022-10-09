const startBtn = document.getElementById('startBtn');
const sound1 = document.getElementById('inline-block_w1');
const soundb1 = document.getElementById('inline-block_b1');
const sound2 = document.getElementById('inline-block_w2');
const soundb2 = document.getElementById('inline-block_b2');
const sound3 = document.getElementById('inline-block_w3');
const sound4 = document.getElementById('inline-block_w4');
const soundb4 = document.getElementById('inline-block_b4');
const sound5 = document.getElementById('inline-block_w5');
const soundb5 = document.getElementById('inline-block_b5');
const sound6 = document.getElementById('inline-block_w6');
const soundb6 = document.getElementById('inline-block_b6');
const sound7 = document.getElementById('inline-block_w7');
const sound8 = document.getElementById('inline-block_w8');
const stopBtn = document.getElementById('stopBtn');
const resetBtn = document.getElementById('resetBtn');
const downloadLink = document.getElementById('download');
const audio = document.getElementById('audio');

const audioData = [];
const bufferSize = 1024;

let audioCtx;
let audio_sample_rate;
let oscillator;
let gain;
let scriptProcessor;

let is_recording = false;

const onAudioProcess = (e) => {
    let input = e.inputBuffer.getChannelData(0);
    const output = e.outputBuffer.getChannelData(0);
    for (let i = 0; i < input.length; i++) output[i] = input[i];
    const bufferData = new Float32Array(bufferSize);
    for (let i = 0; i < bufferSize; i++) {
      bufferData[i] = input[i];
    }
    audioData.push(bufferData);
};

const exportWAV = function (audioData) {

    const encodeWAV = function (samples, sampleRate) {
        const buffer = new ArrayBuffer(44 + samples.length * 2);
        const view = new DataView(buffer);

        const writeString = function (view, offset, string) {
         for (let i = 0; i < string.length; i++) {
            view.setUint8(offset + i, string.charCodeAt(i));
            }
        };

        const floatTo16BitPCM = function (output, offset, input) {
            for (let i = 0; i < input.length; i++ , offset += 2) {
            const s = Math.max(-1, Math.min(1, input[i]));
            output.setInt16(offset, s < 0 ? s * 0x8000 : s * 0x7FFF, true);
            }
        };

        writeString(view, 0, 'RIFF');  // RIFFヘッダ
        view.setUint32(4, 32 + samples.length * 2, true); // これ以降のファイルサイズ
        writeString(view, 8, 'WAVE'); // WAVEヘッダ
        writeString(view, 12, 'fmt '); // fmtチャンク
        view.setUint32(16, 16, true); // fmtチャンクのバイト数
        view.setUint16(20, 1, true); // フォーマットID
        view.setUint16(22, 1, true); // チャンネル数
        view.setUint32(24, sampleRate, true); // サンプリングレート
        view.setUint32(28, sampleRate * 2, true); // データ速度
        view.setUint16(32, 2, true); // ブロックサイズ
        view.setUint16(34, 16, true); // サンプルあたりのビット数
        writeString(view, 36, 'data'); // dataチャンク
        view.setUint32(40, samples.length * 2, true); // 波形データのバイト数
        floatTo16BitPCM(view, 44, samples); // 波形データ

        return view;
    };

    const mergeBuffers = function (audioData) {
        let sampleLength = 0;
        for (let i = 0; i < audioData.length; i++) {
            sampleLength += audioData[i].length;
        }
        const samples = new Float32Array(sampleLength);
        let sampleIdx = 0;
        for (let i = 0; i < audioData.length; i++) {
            for (let j = 0; j < audioData[i].length; j++) {
                samples[sampleIdx] = audioData[i][j];
                sampleIdx++;
            }
        }
        return samples;
    };

    const dataview = encodeWAV(mergeBuffers(audioData), audio_sample_rate);
    const audioBlob = new Blob([dataview], { type: 'audio/wav' });
    console.log(dataview);

    const myURL = window.URL || window.webkitURL;
    const url = myURL.createObjectURL(audioBlob);
    return url;
};

const saveAudio = function () {
    const href = exportWAV(audioData);
    audio.src=href;
    downloadLink.href = href;
    downloadLink.download = 'test.wav';
    // downloadLink.click();
    audioCtx.close();
}

startBtn.addEventListener('click', () => {
    is_recording = true;
    audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    audio_sample_rate = audioCtx.sampleRate;
    scriptProcessor = audioCtx.createScriptProcessor(bufferSize, 1, 1);
    scriptProcessor.onaudioprocess = onAudioProcess;
    scriptProcessor.connect(audioCtx.destination);
});

sound1.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -9); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -9); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

soundb1.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -8); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -8); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

sound2.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -7); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -7); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

soundb2.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -6); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -6); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

sound3.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -5); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -5); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

sound4.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -4); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -4); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

soundb4.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -3); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -3); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

sound5.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -2); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -2); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

soundb5.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -1); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), -1); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

sound6.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), 0); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), 0); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

soundb6.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), 1); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), 1); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});
sound7.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), 2); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), 2); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});
sound8.addEventListener('click', () => {
    if (is_recording) {
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), 3); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(scriptProcessor);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    } else {
        audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        oscillator = audioCtx.createOscillator();
        oscillator.type = 'square';
        oscillator.frequency.value = 440 * Math.pow(Math.pow(2, 1/12), 3); // value in hertz
        gain = audioCtx.createGain();
        gain.gain.value = 0.1;
        oscillator.connect(gain);
        gain.connect(audioCtx.destination);
        const t0 = audioCtx.currentTime;
        oscillator.start(t0);
        oscillator.stop(t0 + 0.2);
    }
});

stopBtn.addEventListener('click', () => {
    is_recording = false;
    saveAudio();
})

resetBtn.addEventListener('click', () => {
    audioData.length = 0;
    audio.src=null;
    audio.removeAttribute('src')
    downloadLink.removeAttribute('href')
    downloadLink.removeAttribute('download')
})