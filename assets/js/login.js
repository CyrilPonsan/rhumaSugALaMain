import { regexMail, regexPasswd } from './data.js';
import { testField, testResponse } from './_login.js';
import { postData } from './fetchData.js';
import * as navbar from './navbar.js';
import { phpScripts } from './data.js';

const input = document.querySelectorAll('input');
const submitBtn = document.querySelector('#submitBtn');
const signIn = document.querySelector('#signIn');
console.log(signIn);

navbar.deconnexion();

submitBtn.addEventListener('click', async () => {
    let testMail = testField(regexMail, input[1]);
    let testPass = testField(regexPasswd, input[2]);
    if (testMail && testPass) {
        const datas = [
            "login",
            input[1].value,
            input[2].value
        ];
        let response = await postData(phpScripts + 'script.php', datas);
        testResponse(response);
    }
});
