<script setup>
const emit = defineEmits(['zoom-out', 'zoom-in', 'fill', 'rotate', 'flip', 'forward', 'back', 'remove'])
</script>

<template>
    <div class="item-toolbar item-toolbar__photo image-component__menu absolute hidden shadow-md top-full">
        <div class="item-toolbar--section">
            <div class="item-toolbar--control">
                <button
                    class="button button__empty item-toolbar--control--button item-toolbar--control--button__zoom-out"
                    style="pointer-events: auto;" @click="emit('zoom-out')">
                    <svg class="svg-sprite item-toolbar--control--button--icon" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="10 10 20 20">
                        <path
                            d="M29.707,28.293 L28.293,29.707 L22.9,24.314 C21.504,25.404 19.799,26 18,26 C15.863,26 13.854,25.168 12.344,23.656 C10.833,22.146 10,20.137 10,18 C10,15.863 10.833,13.854 12.344,12.344 C13.854,10.832 15.863,10 18,10 C20.137,10 22.146,10.832 23.656,12.344 C25.167,13.854 26,15.863 26,18 C26,19.799 25.403,21.504 24.315,22.9 L29.707,28.293 Z M18,24 C19.602,24 21.109,23.376 22.242,22.243 C23.376,21.11 24,19.603 24,18 C24,16.398 23.376,14.891 22.242,13.758 C21.109,12.624 19.602,12 18,12 C16.398,12 14.891,12.624 13.758,13.758 C12.624,14.891 12,16.398 12,18 C12,19.603 12.624,21.11 13.758,22.243 C14.891,23.376 16.398,24 18,24 Z M14,19 L14,17 L22,17 L22,19 L14,19 Z"
                            stroke="none" fill-rule="evenodd"></path>
                    </svg>
                    <span class="item-toolbar--control--button--label">Zoom Out</span>
                </button>
            </div>

            <div class="item-toolbar--control"><button
                    class="button button__empty item-toolbar--control--button item-toolbar--control--button__zoom-in"
                    style="pointer-events: auto;" @click="emit('zoom-in')"><svg class="svg-sprite item-toolbar--control--button--icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="10 10 20 20">
                        <path
                            d="M29.707,28.293 L28.293,29.707 L22.9,24.314 C21.504,25.404 19.799,26 18,26 C15.863,26 13.854,25.168 12.344,23.656 C10.833,22.146 10,20.137 10,18 C10,15.863 10.833,13.854 12.344,12.344 C13.854,10.832 15.863,10 18,10 C20.137,10 22.146,10.832 23.656,12.344 C25.167,13.854 26,15.863 26,18 C26,19.799 25.403,21.504 24.315,22.9 L29.707,28.293 Z M18,24 C19.602,24 21.109,23.376 22.242,22.243 C23.376,21.11 24,19.603 24,18 C24,16.398 23.376,14.891 22.242,13.758 C21.109,12.624 19.602,12 18,12 C16.398,12 14.891,12.624 13.758,13.758 C12.624,14.891 12,16.398 12,18 C12,19.603 12.624,21.11 13.758,22.243 C14.891,23.376 16.398,24 18,24 Z M19,14 L19,17 L22,17 L22,19 L19,19 L19,22 L17,22 L17,19 L14,19 L14,17 L17,17 L17,14 L19,14 Z"
                            stroke="none" fill-rule="evenodd"></path>
                    </svg><span class="item-toolbar--control--button--label">Zoom In</span></button></div>
            <div class="item-toolbar--control"><button
                    class="button button__empty item-toolbar--control--button item-toolbar--control--button__fill-page"
                    style="pointer-events: auto;" @click="emit('fill')"><svg class="svg-sprite item-toolbar--control--button--icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 20 18">
                        <path stroke="none"
                            d="M13.4,5 C14.2832,5 15,5.7176 15,6.6 L15,11.4 C15,12.2832 14.2832,13 13.4,13 L6.6,13 C5.7168,13 5,12.2832 5,11.4 L5,6.6 C5,5.7168 5.7168,5 6.6,5 L13.4,5 Z M2,16 L6,16 L6,18 L2,18 C0.896,18 0,17.104 0,16 L0,12 L2,12 L2,16 Z M18,16 L18,12 L20,12 L20,16 C20,17.104 19.104,18 18,18 L14,18 L14,16 L18,16 Z M18,0 C19.104,0 20,0.897 20,2 L20,6 L18,6 L18,2 L14,2 L14,0 L18,0 Z M2,2.001 L2,6.001 L0,6.001 L0,2.001 C0,0.897 0.896,0.001 2,0.001 L6,0.001 L6,2.001 L2,2.001 Z">
                        </path>
                    </svg><span class="item-toolbar--control--button--label">Fill Page</span></button></div>
            <div class="item-toolbar--control"><button
                    class="button button__empty item-toolbar--control--button item-toolbar--control--button__rotate-image"
                    style="pointer-events: auto;" @click="emit('rotate')"><svg class="svg-sprite item-toolbar--control--button--icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 20 19">
                        <g stroke-width="1" fill-rule="evenodd">
                            <rect height="32" width="32" y="-5.6875" x="-6.4375" fill-opacity="0"></rect>
                            <path
                                d="m0.5625,9.4125c0,5.01804 4.08195,9.09635 9.10728,9.09999c0.25328,0.00364 0.46076,-0.20141 0.46076,-0.455c0,-0.25358 -0.20748,-0.45864 -0.46076,-0.455c-4.53484,-0.00364 -8.19728,-3.66366 -8.19728,-8.18999c0,-4.52877 3.66608,-8.19 8.20425,-8.19c3.68277,0 6.79891,2.41241 7.84177,5.73724l0.33397,1.25125c0.22174,0.1268 0.50354,0.04611 0.62578,-0.17775l-0.17078,-1.5925c-1.23335,-3.56993 -4.6413,-6.12824 -8.63074,-6.12824c-5.02866,0 -9.11425,4.07953 -9.11425,9.1z">
                            </path>
                            <polyline
                                points="19.4119873046875,3.3125 18.2939453125,8.7857666015625 12.5625,7.0169677734375 ">
                            </polyline>
                        </g>
                    </svg><span class="item-toolbar--control--button--label">Rotate</span></button></div>
            <div class="item-toolbar--control"><button
                    class="button button__empty item-toolbar--control--button item-toolbar--control--button__flip"
                    style="pointer-events: auto;" @click="emit('flip')"><svg class="svg-sprite item-toolbar--control--button--icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 19 23">
                        <path
                            d="M8.6262 0h2.0455v2.0455H8.6262V0zm0 4.091h2.0455v2.0454H8.6262V4.0909zM.4524 6.1323L7.264 11.254l-5.1815 3.8832-1.63 1.2304V6.1324zm18.3931 0V16.3676L12.03 11.258l6.8155-5.1256zM8.6262 8.1818h2.0455v2.0455H8.6262V8.1818zm0 4.091h2.0455v2.0454H8.6262v-2.0455zm0 4.0908h2.0455v2.0455H8.6262v-2.0455zm0 4.091h2.0455V22.5H8.6262v-2.0455z"
                            stroke="none" fill-rule="evenodd"></path>
                    </svg><span class="item-toolbar--control--button--label">Flip</span></button></div>
            <div class="item-toolbar--control"><button
                    class="button button__empty item-toolbar--control--button item-toolbar--control--button__forward"
                    style="pointer-events: auto;" @click="emit('forward')"><svg class="svg-sprite item-toolbar--control--button--icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="10 10 20 21">
                        <path
                            d="M28,28.0005 L18,28.0005 L18,24.0005 L22,24.0005 C23.103,24.0005 24,23.1035 24,22.0005 L24,18.0005 L28,18.0005 L28,28.0005 Z M28,16.0005 L24,16.0005 L24,12.0005 C24,10.8985 23.103,10.0005 22,10.0005 L12,10.0005 C10.897,10.0005 10,10.8985 10,12.0005 L10,22.0005 C10,23.1035 10.897,24.0005 12,24.0005 L16,24.0005 L16,28.0005 C16,29.1035 16.897,30.0005 18,30.0005 L28,30.0005 C29.103,30.0005 30,29.1035 30,28.0005 L30,18.0005 C30,16.8985 29.103,16.0005 28,16.0005 L28,16.0005 Z"
                            stroke="none" fill-rule="evenodd"></path>
                    </svg><span class="item-toolbar--control--button--label">Forward</span></button></div>
            <div class="item-toolbar--control"><button
                    class="button button__empty item-toolbar--control--button item-toolbar--control--button__back"
                    style="pointer-events: auto;" @click="emit('back')"><svg class="svg-sprite item-toolbar--control--button--icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="10 10 20 21">
                        <path transform="rotate(180 20,20.000499725341797)" stroke="none" fill-rule="evenodd"
                            d="m28,28.0005l-10,0l0,-4l4,0c1.103,0 2,-0.897 2,-2l0,-4l4,0l0,10zm0,-12l-4,0l0,-4c0,-1.102 -0.897,-2 -2,-2l-10,0c-1.103,0 -2,0.898 -2,2l0,10c0,1.103 0.897,2 2,2l4,0l0,4c0,1.103 0.897,2 2,2l10,0c1.103,0 2,-0.897 2,-2l0,-10c0,-1.102 -0.897,-2 -2,-2l0,0z">
                        </path>
                    </svg><span class="item-toolbar--control--button--label">Back</span></button></div>
        </div><svg class="item-toolbar--section-separator">
            <line x1="1" y1="0" x2="1" y2="100%" stroke-width="1" stroke-dasharray="1,2"></line>
        </svg>
        <div class="item-toolbar--section">
            <div class="item-toolbar--control">
                <button class="button button__empty item-toolbar--control--button item-toolbar--control--button__remove"
                    style="pointer-events: auto;" @click="emit('remove')">
                    <svg class="svg-sprite item-toolbar--control--button--icon"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="11 11 18 20">
                        <path
                            d="M15,18.0005 L25,18.0005 L25.002,28.0005 L15,28.0005 L15,18.0005 Z M13,28.0005 L13,16.0005 L27,16.0005 L27,28.0005 C27,29.1035 26.103,30.0005 25,30.0005 L15,30.0005 C13.897,30.0005 13,29.1035 13,28.0005 Z M23,13.0005 L29,13.0005 L29,15.0005 L11,15.0005 L11,13.0005 L17,13.0005 L17,11.0005 L23,11.0005 L23,13.0005 Z M17,26 L19,26 L19,20 L17,20 L17,26 Z M21,26 L23,26 L23,20 L21,20 L21,26 Z"
                            stroke="none" fill-rule="evenodd"></path>
                    </svg>
                    <span class="item-toolbar--control--button--label">Remove</span>
                </button>
            </div>
        </div>
    </div>
</template>

<style>
.item-toolbar {
    line-height: 24px;
    -webkit-font-smoothing: antialiased;
    font-style: normal;
    font-weight: normal;
    color: #333333;
    cursor: default;
    font-family: "Proxima Nova", Helvetica, sans-serif;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    user-select: none;
    visibility: visible;
    box-sizing: content-box;
    margin-top: 20px;
    background: #ffffff;
    font-size: 0.875em;
    padding: 0.65em;
    pointer-events: auto;
    white-space: nowrap;
    z-index: 2;
}

.item-toolbar--section {
    line-height: 24px;
    -webkit-font-smoothing: antialiased;
    font-style: normal;
    font-weight: normal;
    color: #333333;
    cursor: default;
    font-family: "Proxima Nova", Helvetica, sans-serif;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    user-select: none;
    visibility: visible;
    font-size: 0.875em;
    pointer-events: auto;
    white-space: nowrap;
    box-sizing: content-box;
    margin: 0;
    padding: 0;
    align-items: center;
    display: flex;
    column-gap: 15px;
}

.item-toolbar--section-separator {
    line-height: 24px;
    -webkit-font-smoothing: antialiased;
    font-style: normal;
    font-weight: normal;
    color: #333333;
    cursor: default;
    font-family: "Proxima Nova", Helvetica, sans-serif;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    user-select: none;
    visibility: visible;
    font-size: 0.875em;
    pointer-events: auto;
    white-space: nowrap;
    box-sizing: content-box;
    padding: 0;
    height: 3.14em;
    margin: 0 0.5em;
    width: 2px;
    overflow: hidden;
}

.item-toolbar--control {
    line-height: 24px;
    -webkit-font-smoothing: antialiased;
    font-style: normal;
    font-weight: normal;
    color: #333333;
    cursor: default;
    font-family: "Proxima Nova", Helvetica, sans-serif;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    user-select: none;
    visibility: visible;
    font-size: 0.875em;
    pointer-events: auto;
    white-space: nowrap;
    box-sizing: content-box;
    margin: 0;
    padding: 0;
}

.item-toolbar--control--button {
    -webkit-font-smoothing: antialiased;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    user-select: none;
    visibility: visible;
    white-space: nowrap;
    color: #6c62a1;
    background-color: transparent;
    border: none;
    border-radius: 0.25em;
    box-sizing: border-box;
    cursor: pointer;
    display: inline-block;
    font-family: "Proxima Nova", Helvetica, sans-serif;
    font-size: 1.2em;
    line-height: 1em;
    outline: none;
    padding: 0;
    position: relative;
    transition: background-color 0.2s ease;
    pointer-events: auto;
    display: flex;
    flex-direction: column;
    row-gap: 4px;
    align-items: center;
    justify-content: center;
}

.item-toolbar--control--button--icon {
    -webkit-font-smoothing: antialiased;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    user-select: none;
    visibility: visible;
    white-space: nowrap;
    color: buttontext;
    cursor: pointer;
    font-family: "Proxima Nova", Helvetica, sans-serif;
    font-size: 1em;
    line-height: 1em;
    pointer-events: auto;
    box-sizing: content-box;
    margin: 0;
    padding: 0;
    fill: #6c62a1;
    height: 22px;
    stroke: #6c62a1;
    width: 22px;
    overflow: hidden;
}
</style>