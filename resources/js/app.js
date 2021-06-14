/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import axios from "axios";
window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "list-component",
    require("./components/ListComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
document.addEventListener(
    "DOMContentLoaded",
    function() {
        //STEP一覧ページのリストのインスタンス生成
        if (document.getElementById("app")) {
            const app = new Vue({
                el: "#app"
            });
        }

        //文字数カウント
        if (document.getElementById("js-textArea")) {
            const textArea = document.getElementById("js-textArea");
            const length = textArea.value.length;
            if (document.getElementById("js-textCount")) {
                const textCount = document.getElementById("js-textCount");
                textCount.innerHTML = length;
                textArea.onkeyup = function() {
                    if (document.getElementById("js-textMax")) {
                        const textMax = document.getElementById("js-textMax");
                        const Max = Number(textMax.textContent);
                        const length = textArea.value.length;
                        textCount.innerHTML = length;
                        const lest = length - Max;
                        if (lest > 0) {
                            textCount.style.color = "#ff3b30";
                        } else {
                            textCount.style.color = "#555555";
                        }
                    }
                };
            }
        }

        //ファイル選択した画像を表示する
        if (document.getElementById("file-icon")) {
            const fileIcon = document.getElementById("file-icon");
            fileIcon.addEventListener(
                "change",
                function(e) {
                    // 1枚だけ表示する
                    var file = e.target.files[0];

                    // ファイルのブラウザ上でのURLを取得する
                    var blobUrl = window.URL.createObjectURL(file);

                    // img要素に表示
                    var img = document.getElementById("js-preview");
                    img.src = blobUrl;
                },
                false
            );
        }

        //フラッシュメッセージのフェードアウト
        if (document.getElementById("js-flash")) {
            const flash = document.getElementById("js-flash");
            setTimeout(function() {
                flash.style.display = "none";
            }, 3000);
        }

        //STEPの削除確認
        if (document.getElementById("js-confim-delete")) {
            document.getElementById("js-confim-delete").onclick = function() {
                let checkDeleteFlg = window.confirm(
                    "削除してもよろしいですか？"
                );

                if (checkDeleteFlg) {
                    return true;
                } else {
                    window.alert("キャンセルされました");
                    return false;
                }
            };
        }

        //STEPの登録で子STEPのフィールドを追加
        if (document.getElementById("js-addStep")) {
            let count = 2;
            const step = document.getElementById("js-addStep");

            step.onclick = function() {
                const field = `
                <label for="title_children">子STEP${count}のタイトル<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大100文字まで）</span></label>
                <input id="title_children" type="name" class="p-form__input-text c-input-text" name="title_children[]" required autocomplete="name">
                <label for="clear_times">子STEP${count}の達成時間<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大3桁まで）</span></label>
                <div class="p-form__wrap">
                    <input id="clear_times" type="number" class="p-form__input-number c-input-text" name="clear_times[]" required autocomplete="name">時間
                </div>
                <label for="content_children">子STEP${count}の内容<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大5,000文字まで）</span></label>
                <textarea name="content_children[]" class="p-form__textarea" required autocomplete="name" cols="30" rows="10"></textarea>
                `;
                step.insertAdjacentHTML("beforebegin", field);
                count++;
            };
        }

        //STEPのシェア画面のポップアップ
        if (document.getElementById("js-popup")) {
            const popup = document.getElementById("js-popup");
            var blackBg = document.getElementById("js-black-bg");
            var closeBtn = document.getElementById("js-close-popup");
            var showBtn = document.getElementById("js-show-popup");
            closePopUp(blackBg);
            closePopUp(closeBtn);
            closePopUp(showBtn);

            //表示の切替
            function closePopUp(elem) {
                elem.addEventListener("click", function() {
                    popup.classList.toggle("is-show");
                });
            }
        }
    },
    false
);
