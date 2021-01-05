require('./bootstrap');
require('alpinejs');
import hotkeys from 'hotkeys-js';
import { EmojiButton } from '@joeattardi/emoji-button';

hotkeys('ctrl+return, command+return', function() {
    window.livewire.emit('toggleShift');
});


window.notificationOpen = false;
window.notificationTimeout = null;
window.notficationRemove = null;
window.notification = {

    show: function(type, message){

        // clear the current timeouts
        clearTimeout(notificationTimeout);
        clearTimeout(notficationRemove);
        if(document.getElementById('notification')){
            document.getElementById('notification').remove();
        }

        let successSVG = `<svg class="w-auto h-8 relative" viewBox="0 0 1511 1127" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g><path d="M1260.043.995V288.929h250.728v-71.801h-179.265V.995h-71.463zM0 .995V288.929H250.728v-71.801H71.462V.995H0zm888.5.339H828.685v161.959H773.943v54.174h-37.116v-54.174H682.313V1.334h-71.462v179.7H665.026V235.095H719.43v54.174H791.23v-54.174H845.971V181.034H900.487V1.334H888.5zm323.462.34H988.49v53.722H933.974v180.039H988.49v54.176h235.459v-71.803h-218.173v-36.434h108.917V109.572h-108.917V73.476h218.173V1.674h-11.987zm-648.512 0H339.976v53.722h-54.514v180.039h54.514v54.176H575.436v-71.803H357.264v-36.434H466.18v-71.802H357.264V73.476h218.172V1.674H563.45z" fill="#1A1A1A"/><path d="M1351.051 421.02H801.831v704.715h166.401V856.578h406.975V722.706h135.564V555.457h-135.564V421.02h-24.156zM968.232 639.082v-50.813h375.291V689.33h-375.29v-50.25zm-282.6-217.217H542.54v537.467H167.25V421.865H0v570.841H135.283v133.874h438.94V992.706h135.565V421.865h-24.156z" fill="#28DFA4"/></g></g></svg>`;
        let notifySVG = `<svg class="w-auto h-12 relative" viewBox="0 0 312 283" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient cx="50.368%" cy="42.771%" fx="50.368%" fy="42.771%" r="58.47%" gradientTransform="scale(.9757 1) rotate(8.281 .51 .514)" id="nsvg"><stop stop-color="#8C9BB2" offset="0%"/><stop stop-color="#52555C" offset="100%"/></radialGradient></defs><g transform="translate(0 -1)" fill-rule="nonzero" fill="none"><path d="M170.683 283.994c-4.043-43.442-30.707-77-62.999-77-32.291 0-58.953 33.563-63.001 77h126z" fill="#52555C"/><path d="M58.71 260.59c14.548-7.639 30.224-11.144 47.028-10.516 22.032.069 42.568 5.622 61.607 16.66l.338.26c-8.594-34.91-32.326-60-60.261-60-27.387 0-50.737 24.119-59.74 57.964a93.029 93.029 0 0111.028-4.369z" fill="#45474E"/><path d="M140.683 226.994h-69M220.683 105.71s36.477-39.299 91-24.306l-4.539 31.47s-39.389-18.584-77.586 1.12l-8.875-8.284z" fill="#211107"/><path d="M218.683 104.432s52.872-7.359 86 38.242l-23.124 21.32s-19.105-38.896-61.117-47.655l-1.76-11.907z" fill="#211107"/><path d="M222.05 52.28s21.533-61.568-13.007-49.788c-25.256 8.612-65.64 9.632-85.528 9.557-65.819-3.436-111 31.24-121.09 100.512-10.966 75.289 30.49 116.145 105.807 127.107 75.318 10.962 126.709-16.38 137.675-91.664 5.854-40.192-2.937-72.586-23.857-95.724z" fill="url(#nsvg)"/><path d="M25.03 53.6C16.289 65.77 9.746 80.545 5.683 97.857c9.73-.857 131.324-10.446 241.732 35.137 1.236-20.892-1.828-39.394-8.778-55.265.005 0-100.203-52.994-213.607-24.129z" fill="#122107"/><path d="M140.757 93.836l-33.132-4.78a15.145 15.145 0 01-9.943-5.869 14.876 14.876 0 01-2.841-11.115l.623-4.252c1.204-8.188 8.879-13.86 17.144-12.668l33.132 4.78a15.145 15.145 0 019.943 5.869 14.876 14.876 0 012.842 11.115l-.618 4.26a14.958 14.958 0 01-5.928 9.85 15.228 15.228 0 01-11.222 2.81z" fill="#99B4C1"/><ellipse fill="#FFF" transform="rotate(-83.951 113.305 63.126)" cx="113.305" cy="63.126" rx="3.938" ry="10.921"/><path d="M218.683 170.003s-11.731 34.266-103.876 20.894c-99.994-14.507-96.104-49.91-96.104-49.91s15.476-46.908 107.026-33.624c84.286 12.234 92.954 62.64 92.954 62.64z" fill="#8F90A1"/><path d="M219.683 168.466s-11.348 31.584-103.487 18.24c-99.994-14.482-96.499-47.202-96.499-47.202s14.955-43.243 106.498-29.984c84.3 12.208 93.488 58.946 93.488 58.946z" fill="#FDD2B7"/><path d="M123.938 125.856c52.055 7.529 80.434 25.928 95.745 42.138-1.046-4.296-13.38-46.914-93.349-58.479C51.2 98.65 27.69 125.81 21.683 135.87c18.884-10.054 50.42-17.51 102.255-10.013z" fill="#F19E89"/><path d="M153.314 167.768c.352-2.154 1-4.249 1.925-6.224 1.323-2.798 3.136-5.06 5.1-6.574a11.673 11.673 0 013.038-1.707 8.844 8.844 0 013.08-.57 8.2 8.2 0 011.34.112 8.42 8.42 0 013.54 1.495 10.89 10.89 0 012.267 2.215 15.63 15.63 0 012.486 4.902c.624 2.045.936 4.172.926 6.31a24.2 24.2 0 01-.33 3.953 2.845 2.845 0 002.332 3.275 2.835 2.835 0 003.26-2.342 30.12 30.12 0 00.405-4.885 27.167 27.167 0 00-.945-7.178 23.065 23.065 0 00-1.878-4.762 18.07 18.07 0 00-4.594-5.639 14.784 14.784 0 00-3.056-1.897 13.852 13.852 0 00-3.483-1.069 13.74 13.74 0 00-2.267-.19 14.85 14.85 0 00-6.612 1.608 18.648 18.648 0 00-4.297 2.986 23.944 23.944 0 00-4.996 6.64 28.99 28.99 0 00-2.834 8.603 2.853 2.853 0 00.995 2.666 2.824 2.824 0 002.795.468 2.844 2.844 0 001.802-2.198l.001.002zM54.32 150.766c.35-2.156.997-4.25 1.924-6.226 1.322-2.8 3.133-5.062 5.1-6.575a11.679 11.679 0 013.036-1.708 8.838 8.838 0 013.079-.57c.45 0 .899.038 1.343.11 1.278.22 2.489.732 3.54 1.496.857.624 1.62 1.37 2.265 2.215a15.676 15.676 0 012.484 4.905c.625 2.045.937 4.173.925 6.313a24.204 24.204 0 01-.328 3.953 2.855 2.855 0 00.995 2.666 2.823 2.823 0 002.795.467 2.844 2.844 0 001.8-2.199c.269-1.615.404-3.25.405-4.887a27.202 27.202 0 00-.945-7.18 23.021 23.021 0 00-1.877-4.763 18.058 18.058 0 00-4.593-5.642 14.77 14.77 0 00-3.056-1.889 13.764 13.764 0 00-5.755-1.258c-2.297.015-4.56.565-6.61 1.605a18.696 18.696 0 00-4.297 2.988 24.007 24.007 0 00-4.995 6.643 29.03 29.03 0 00-2.833 8.605 2.846 2.846 0 002.33 3.277 2.835 2.835 0 003.26-2.34l.007-.006zM148.179 130.195c1.197 2.445 4.177 3.483 6.674 2.325 7.605-3.533 24.238-9.18 43.177-2.629 25.954 8.978 13.97-19.887-9.111-20.84-23.56-.972-33.718 10.559-39.41 15.19a4.892 4.892 0 00-1.33 5.954zM92.454 125.24a5.033 5.033 0 01-7.083.55c-6.429-5.481-21.037-15.419-41.124-13.904-27.523 2.086-8.248-23.322 14.37-18.212 23.069 5.207 29.86 19.255 34.14 25.334a5.075 5.075 0 01-.303 6.233z" fill="#211107"/></g></svg>`;
        let warningSVG = `<svg class="w-auto h-12 relative" viewBox="0 0 312 298" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient cx="49.043%" cy="45.971%" fx="49.043%" fy="45.971%" r="57.271%" gradientTransform="matrix(1 0 0 .97674 0 .01)" id="nsvg"><stop stop-color="#8C9BB2" offset="0%"/><stop stop-color="#52555C" offset="100%"/></radialGradient></defs><g fill-rule="nonzero" fill="none"><path d="M206.2 297.511c-4.137-44.57-31.437-79-64.5-79s-60.363 34.426-64.5 79h129z" fill="#52555C"/><path d="M92.319 272.994c14.67-7.766 30.476-11.328 47.42-10.685 22.216.07 42.923 5.715 62.121 16.938l.34.264c-8.665-35.49-32.595-61-60.763-61-27.617 0-51.16 24.521-60.237 58.93a93.352 93.352 0 0111.119-4.447z" fill="#45474E"/><path d="M220.2 106.441s31.333-45.25 89-38.18v32.564s-42.793-12.965-78.756 12.686l-10.244-7.07z" fill="#211107"/><path d="M218.2 104.255s52.589-15.26 93 26.191l-20.312 25.065s-25.178-36.705-69.138-39.42l-3.55-11.836z" fill="#211107"/><path d="M213.89 51.863s12.735-65.557-20.533-48.528c-24.324 12.45-65.103 19.438-85.272 22.296C40.873 31.857.2 73.655.2 145.327c0 77.902 48.048 113.184 126.001 113.184S252.2 223.23 252.2 145.327c0-41.58-13.691-73.099-38.31-93.464z" fill="url(#nsvg)"/><path d="M13.31 81.892C6.228 95.49 1.764 111.4.2 129.512c9.767-2.297 131.98-29.882 251 0-1.842-21.317-7.706-39.583-17.119-54.619 0-.007-109.744-38.882-220.771 7z" fill="#211107"/><rect fill="#99B4C1" x="87.2" y="71.511" width="65" height="35" rx="17.5"/><ellipse fill="#FFF" cx="106.2" cy="78.511" rx="11" ry="4"/><path d="M227.2 171.744s-6.816 36.767-102.19 36.767c-103.5 0-104.81-36.767-104.81-36.767s8.74-50.233 103.508-50.233c87.24 0 103.492 50.233 103.492 50.233z" fill="#8F90A1"/><path d="M228.2 169.709s-6.816 33.802-102.19 33.802c-103.5 0-104.81-33.802-104.81-33.802s8.74-46.198 103.5-46.198c87.248 0 103.5 46.198 103.5 46.198z" fill="#FDD2B7"/><path d="M125.128 140.579c53.76 0 85.185 14.618 103.072 28.932-1.695-4.246-20.485-46-103.072-46-77.596 0-97.345 31.255-101.928 42.431 17.608-13.073 48.396-25.363 101.928-25.363z" fill="#F19E89"/><ellipse fill="#211107" cx="177.2" cy="175.011" rx="15" ry="20.5"/><ellipse fill="#211107" cx="71.2" cy="175.011" rx="15" ry="20.5"/><path d="M140.608 132.84c1.096-2.644 4.068-3.886 6.656-2.782 7.884 3.37 25.021 8.548 43.92.705 25.892-10.749 15.118 20.367-8.247 22.485-23.84 2.158-34.701-9.536-40.697-14.171-1.878-1.447-2.551-4.02-1.632-6.237zM101.565 129.177a5.097 5.097 0 00-6.918-2.042c-7.526 4.11-24.103 10.938-43.729 5.194-26.89-7.869-13.045 21.5 10.46 21.18 23.991-.329 33.658-12.902 39.178-18.06a5.182 5.182 0 001.009-6.272z" fill="#211107"/></g></svg>`;
        let errorSVG = `<svg class="w-auto h-12 relative" style="margin-left:-1px;" viewBox="0 0 312 272" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient cx="49.043%" cy="45.971%" fx="49.043%" fy="45.971%" r="57.27%" gradientTransform="matrix(1 0 0 .97425 0 .012)" id="nsvg"><stop stop-color="#8C9BB2" offset="0%"/><stop stop-color="#52555C" offset="100%"/></radialGradient></defs><g fill-rule="nonzero" fill="none"><path d="M203.142 272.001c-3.722-40.057-28.27-71-57.999-71-29.729 0-54.279 30.94-58 71h116z" fill="#52555C"/><path d="M100.16 250.125c13.213-6.998 27.452-10.209 42.717-9.634 20.013.063 38.667 5.153 55.96 15.272l.305.238c-7.805-32-29.363-55-54.735-55-24.878 0-46.088 22.11-54.265 53.134a83.785 83.785 0 0110.018-4.01z" fill="#45474E"/><path d="M176.142 220.001h-64" fill="#333"/><path d="M229.142 95.7s28.164-40.333 80-34.03v29.023s-38.466-11.556-70.792 11.308l-9.208-6.301z" fill="#211107"/><path d="M227.142 94.491s47.498-13.846 84 23.766l-18.348 22.744s-22.74-33.307-62.444-35.77l-3.208-10.74z" fill="#211107"/><path d="M222.632 46.377s11.472-59.204-18.496-43.826c-21.916 11.238-58.644 17.555-76.81 20.136-60.546 5.623-97.184 43.37-97.184 108.098 0 70.353 43.281 102.216 113.5 102.216 70.22 0 113.5-31.863 113.5-102.216 0-37.552-12.34-66.023-34.51-84.408z" fill="url(#nsvg)"/><path d="M42.948 74.146C36.57 86.375 32.55 100.702 31.142 117c8.795-2.067 118.835-26.892 226 0-1.66-19.184-6.938-35.623-15.415-49.154 0-.007-98.813-34.998-198.78 6.299z" fill="#211107"/><rect fill="#99B4C1" x="109.142" y="64.001" width="59" height="32" rx="16"/><path d="M136.142 70.501c0 1.934-4.47 3.5-9.999 3.5-5.528 0-10-1.568-10-3.5 0-1.931 4.47-3.5 10-3.5s10 1.569 10 3.5z" fill="#FFF"/><path d="M236.142 155.042s-6.157 32.96-92.315 32.96c-93.5 0-94.685-32.96-94.685-32.96s7.895-45.04 93.5-45.04c78.82 0 93.5 45.04 93.5 45.04z" fill="#8F90A1"/><path d="M236.142 152.579S230.02 183 144.32 183c-93 0-94.178-30.422-94.178-30.422s7.859-41.578 93-41.578c78.399 0 93 41.578 93 41.578z" fill="#ED1C24"/><path d="M143.125 127.214c48.515 0 76.875 13.03 93.017 25.787-1.53-3.785-18.487-41-93.017-41-70.026 0-87.848 27.858-91.983 37.82 15.89-11.652 43.673-22.607 91.983-22.607z" fill="#8E0D10"/><path d="M188.544 137.144L200.365 128c6.96 4.45 11.777 14.052 11.777 25.179 0 15.366-9.178 27.821-20.5 27.821s-20.5-12.455-20.5-27.821a36.91 36.91 0 011.152-9.212 67.52 67.52 0 0016.25-6.824z" fill="#5D0000"/><path d="M185.423 138.94L195.802 131c6.105 3.86 10.34 12.194 10.34 21.856 0 13.335-8.059 24.144-18 24.144-9.94 0-18-10.81-18-24.144a31.646 31.646 0 011.012-7.995 59.758 59.758 0 0014.269-5.922z" fill="#FFF"/><path d="M97.166 134.79L85.632 126c-6.789 4.28-11.49 13.52-11.49 24.231 0 14.785 8.955 26.77 20 26.77s20-11.985 20-26.77a35.041 35.041 0 00-1.122-8.864 66.434 66.434 0 01-15.854-6.579z" fill="#5D0000"/><path d="M98.863 138.94L88.483 131c-6.105 3.86-10.34 12.194-10.34 21.856 0 13.335 8.058 24.144 18 24.144s18-10.81 18-24.144a31.645 31.645 0 00-1.011-7.995 59.664 59.664 0 01-14.27-5.922z" fill="#FFF"/><path d="M163.52 134.645a4.655 4.655 0 006.57 0c5.535-5.51 18.295-15.712 36.92-15.752 25.528-.056 5.946-22.075-14.537-15.75-20.9 6.447-26.155 19.876-29.668 25.782a4.683 4.683 0 00.715 5.72zM123.443 140.944a4.655 4.655 0 01-6.53-.618c-4.987-5.988-16.714-17.312-35.228-19.107-25.37-2.462-3.832-22.454 15.937-14.256 20.171 8.367 24.133 22.184 27.065 28.373a4.661 4.661 0 01-1.244 5.608z" fill="#211107"/><path d="M14.068 40.217L37.396 60l-4.117-11.168L44.66 54.9l-3.146-14.688 11.63 8.62L38.081 15S3.777 16.405 14.068 40.217z" fill="#8E0D10"/><path d="M34.17 1.001c-5.05-.001-9.706 2.7-12.18 7.063-5.517-4.326-13.464-3.716-18.244 1.4a13.269 13.269 0 00-.01 18.138 11.134 11.134 0 00-.998 15.338c3.815 4.57 10.56 5.4 15.388 1.896 4.827-3.505 6.062-10.13 2.818-15.114a13.472 13.472 0 004.2-4.298c4.718 3.957 11.499 4.37 16.672 1.018 5.172-3.353 7.508-9.676 5.743-15.547C45.794 5.025 40.347 1 34.166 1.001h.004z" fill="#ED1C24"/><path d="M276.216 43.215l-23.328 19.786 4.117-11.17-11.383 6.068 3.15-14.684-11.63 8.619L252.202 18s34.306 1.401 24.014 25.214z" fill="#8E0D10"/><path d="M257.115 4.001c5.049 0 9.704 2.699 12.178 7.06 5.518-4.32 13.46-3.708 18.237 1.406a13.268 13.268 0 01.014 18.131 11.134 11.134 0 011.004 15.34c-3.815 4.57-10.562 5.403-15.39 1.897-4.829-3.505-6.064-10.132-2.818-15.116a13.476 13.476 0 01-4.2-4.3c-4.717 3.959-11.498 4.374-16.671 1.021-5.173-3.352-7.51-9.675-5.744-15.546 1.766-5.871 7.213-9.895 13.394-9.893h-.004z" fill="#ED1C24"/></g></svg>`;

        let successColor = `text-green-400`;
        let notifyColor = `text-blue-400`;
        let warningColor = `text-orange-400`;
        let errorColor = `text-red-400`;

        let successTitle = `Awesome!`;
        let notifyTitle = `Notice`;
        let warningTitle = `Uh Oh!`;
        let errorTitle = `Something went wrong`;

        let notificationSVG = notifySVG;
        let notificationColor = notifyColor;
        let notificationTitle = notifyTitle;

        switch(type){
            case 'success':
                notificationSVG = successSVG;
                notificationColor = successColor;
                notificationTitle = successTitle;
                break;

            case 'warning':
                notificationSVG = warningSVG;
                notificationColor = warningColor;
                notificationTitle = warningTitle;
                break;

            case 'info':
                notificationSVG = notifySVG;
                notificationColor = notifyColor;
                notificationTitle = notifyTitle;
                break;

            case 'error':
                notificationSVG = errorSVG;
                notificationColor = errorColor;
                notificationTitle = errorTitle;
                break;

        }

        let notificationHTML = `<div class="w-80 h-auto rounded-t-lg border border-gray-200 border-b-0 dark:border-dark-800 shadow-2xl border bg-white dark:bg-dark-900 flex relative">
                                    <button class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150 absolute right-0 top-0 mt-3 mr-3 close-notification">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="w-16 flex items-center rounded-tl-lg relative h-16 bg-gray-50 p-2 border-r border-gray-200">
                                        <div class="w-auto rounded-full pl-1 relative">
                                            ` + notificationSVG + `
                                        </div>
                                    </div>
                                    <div class="w-full ml-5 mt-2 mb-3">
                                        <h4 class="` + notificationColor + ` font-bold">` + notificationTitle + `</h4>
                                        <p class="text-xs text-gray-600 pr-8">` + message + `</p>
                                    </div>
                                </div>`;

        let notificationElement = document.createElement('div');
        notificationElement.className = 'fixed bottom-0 z-50 mt-3 mr-3 -ml-40 transition-all duration-300 ease-out transform translate-y-2 opacity-0 left-1/2';
        notificationElement.id = 'notification';
        notificationElement.innerHTML = notificationHTML;
        document.getElementById('app').appendChild(notificationElement);

        let notificationCloseBtns = document.getElementsByClassName('close-notification');
        for(var i=0; i<notificationCloseBtns.length; i++){
            notificationCloseBtns[i].addEventListener('click', function(){

                document.getElementById('notification').classList.add('opacity-0', 'translate-y-2');
                notficationRemove = setTimeout(function(){
                    document.getElementById('notification').remove();
                    clearTimeout(notificationTimeout);
                }, 2000);
            });
        }

        setTimeout(function(){
            notificationOpen = true;
            document.getElementById('notification').classList.remove('translate-y-2', 'opacity-0');
        }, 100);
        notificationTimeout = setTimeout(function(){
            document.getElementById('notification').classList.add('opacity-0');
            notficationRemove = setTimeout(function(){
                document.getElementById('notification').remove();
            }, 2000);
        }, 4000);
    }

}

/********** LIVEWIRE EVENT LISTENERS ********/

window.addEventListener('notification', event => {
    notification.show( event.detail.type, event.detail.message );
});

window.addEventListener('show-notification', event => {
    showNotification( event.detail.amount, event.detail.message );
});


/********** END LIVEWIRE EVENT LISTENERS **********/

/********** START EMOJI PICKER FUNCTIONALITY ***********/

let currentEmojiInputLocation = 0;
let selectedInput = null;
let trigger = document.querySelectorAll('.emoji-trigger');

// trigger.addEventListener('click', function(){
//     console.log(this);
//     //picker.togglePicker(trigger);
// });

console.log(trigger.length);

// loop through each trigger
for( var i=0; i<trigger.length; i++){


    // add the click event for each trigger
    trigger[i].addEventListener('click', function(){

        let currentInput = this.parentNode.firstElementChild;
        //console.log(this);
        let picker = new EmojiButton();
        picker.on('emoji', selection => {
            // handle the selected emoji here
            currentInput.value = currentInput.value + selection.emoji;
        });

        picker.togglePicker(this);
    });
    console.log(trigger[i].parentNode.querySelector('.emoji-trigger'));
    // for each parent node .emoji-input add the keyup event
    trigger[i].parentNode.firstElementChild.addEventListener('keyup', e => {
        currentEmojiInputLocation = e.target.selectionStart;
    });

    trigger[i].parentNode.firstElementChild.addEventListener('focus', e => {
        selectedInput = this;
        setTimeout(function(){
            console.log(e.target.selectionStart);
            currentEmojiInputLocation = e.target.selectionStart;
        }, 10)
    });

    // trigger[i].parentNode.firstElementChild.addEventListener('blur', e => {

    //     currentEmojiInputLocation = 0;
    // });

}

window.addEmojiInString = function(str, index, emoji){
    return str.substring(0, index) + emoji + str.substring(index, str.length);
}
// trigger.addEventListener('click', function(){
//     picker.togglePicker(trigger);
// });



/********** END EMOJI PICKER FUNCTIONALITY ***********/
