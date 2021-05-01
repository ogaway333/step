/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import axios from 'axios';
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('list-component', require('./components/ListComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 document.addEventListener('DOMContentLoaded', function() {
    //
    if (document.getElementById("app")) {
        const app = new Vue({
            el: '#app',
            
        });
    }
    
    //ファイル選択した画像を表示する
    if(document.getElementById('file-icon')){
        const fileIcon = document.getElementById('file-icon');
        fileIcon.addEventListener('change', function(e) {
            // 1枚だけ表示する
            var file = e.target.files[0];
        
            // ファイルのブラウザ上でのURLを取得する
            var blobUrl = window.URL.createObjectURL(file);
        
            // img要素に表示
            var img = document.getElementById('js-preview');
            img.src = blobUrl;
        }, false);
    }
    
    //フラッシュメッセージのフェードアウト
    if(document.getElementById('js-flash')){
        const flash = document.getElementById('js-flash');
        setTimeout(function(){
            flash.style.display = "none"; 
        }, 3000);
    }

    //STEPの削除確認
    if(document.getElementById('js-confim-delete')){
        document.getElementById("js-confim-delete").onclick = function() {
            let checkDeleteFlg = window.confirm('削除してもよろしいですか？');
            
            if(checkDeleteFlg) {
                return true;
            } else {
                window.alert('キャンセルされました'); 
                return false;
            }
        };
    }

    //STEPのシェア画面のポップアップ
    if(document.getElementById('js-popup')){
        const popup = document.getElementById('js-popup');
        var blackBg = document.getElementById('js-black-bg');
        var closeBtn = document.getElementById('js-close-popup');
        var showBtn = document.getElementById('js-show-popup');
        closePopUp(blackBg);
        closePopUp(closeBtn);
        closePopUp(showBtn);
        
        //表示の切替
        function closePopUp(elem) {
            elem.addEventListener('click', function() {
                popup.classList.toggle('is-show');
            });
        }

    }
}, false);







