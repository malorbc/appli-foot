<style>
    .bottom-tabs a{
        padding:15px;
        transition: ease-in-out 0.2s;
        border-radius:100%;
    }

    .bottom-tabs a svg{
        fill:rgba(129, 140, 248, 1)
    }

    .bottom-tabs a:hover svg{
        fill:white;
    }

    .bottom-tabs a:hover{
        transition: ease-in-out 0.2s;
        background-color: rgba(129, 140, 248, 1);
    }
</style>
<div class="bottom-tabs sm:hidden bg-white shadow fixed bottom-0 z-50 w-full py-2">
    <div class="flex justify-around align-center">
        <a href="{{route('dashboard')}}"><svg height="30" viewBox="0 0 512 512" width="30" xmlns="http://www.w3.org/2000/svg"><path d="m498.195312 222.695312c-.011718-.011718-.023437-.023437-.035156-.035156l-208.855468-208.847656c-8.902344-8.90625-20.738282-13.8125-33.328126-13.8125-12.589843 0-24.425781 4.902344-33.332031 13.808594l-208.746093 208.742187c-.070313.070313-.140626.144531-.210938.214844-18.28125 18.386719-18.25 48.21875.089844 66.558594 8.378906 8.382812 19.445312 13.238281 31.277344 13.746093.480468.046876.964843.070313 1.453124.070313h8.324219v153.699219c0 30.414062 24.746094 55.160156 55.167969 55.160156h81.710938c8.28125 0 15-6.714844 15-15v-120.5c0-13.878906 11.289062-25.167969 25.167968-25.167969h48.195313c13.878906 0 25.167969 11.289063 25.167969 25.167969v120.5c0 8.285156 6.714843 15 15 15h81.710937c30.421875 0 55.167969-24.746094 55.167969-55.160156v-153.699219h7.71875c12.585937 0 24.421875-4.902344 33.332031-13.808594 18.359375-18.371093 18.367187-48.253906.023437-66.636719zm0 0"/></svg></a>
        <a href="{{route('agenda.index')}}"><svg id="Layer_4" enable-background="new 0 0 24 24" height="30" viewBox="0 0 24 24" width="30" xmlns="http://www.w3.org/2000/svg"><path d="m21 3h-1v-2c0-.552-.448-1-1-1h-1c-.552 0-1 .448-1 1v2h-10v-2c0-.552-.448-1-1-1h-1c-.552 0-1 .448-1 1v2h-1c-1.654 0-3 1.346-3 3v15c0 1.654 1.346 3 3 3h18c1.654 0 3-1.346 3-3v-15c0-1.654-1.346-3-3-3zm1 18c0 .551-.449 1-1 1h-18c-.551 0-1-.449-1-1v-10.96h20z"/></svg></a>
        <a href="{{route('statistiques.index')}}"><svg height="30" viewBox="0 0 512 512" width="30" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.484375 0-256 114.496094-256 256 0 141.484375 114.496094 256 256 256 141.484375 0 256-114.496094 256-256 0-141.484375-114.496094-256-256-256zm0 472c-119.378906 0-216-96.609375-216-216 0-119.378906 96.609375-216 216-216 119.378906 0 216 96.609375 216 216 0 119.378906-96.609375 216-216 216zm180-269.332031v76c0 11.046875-8.953125 20-20 20s-20-8.953125-20-20v-27.714844l-72.523438 72.523437c-7.8125 7.808594-20.476562 7.808594-28.285156 0l-92.523437-92.523437-92.523438 92.523437c-7.8125 7.808594-20.472656 7.8125-28.285156 0-7.808594-7.8125-7.808594-20.476562 0-28.285156l106.667969-106.667968c7.8125-7.808594 20.472656-7.808594 28.285156 0l92.523438 92.527343 58.378906-58.382812h-27.714844c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h76c11.210938 0 20 9.191406 20 20zm0 0"/></svg></a>
        <a href="#"><?xml version="1.0" encoding="iso-8859-1"?>
            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="30" width="30"
                 viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve">
            <g>
                <g>
                    <path d="M238.933,0C106.974,0,0,106.974,0,238.933s106.974,238.933,238.933,238.933s238.933-106.974,238.933-238.933
                        C477.726,107.033,370.834,0.141,238.933,0z M339.557,246.546c-1.654,3.318-4.343,6.008-7.662,7.662v0.085L195.362,322.56
                        c-8.432,4.213-18.682,0.794-22.896-7.638c-1.198-2.397-1.815-5.043-1.8-7.722V170.667c-0.004-9.426,7.633-17.07,17.059-17.075
                        c2.651-0.001,5.266,0.615,7.637,1.8l136.533,68.267C340.331,227.863,343.762,238.11,339.557,246.546z"/>
                </g>
            </g>
            </svg>
            </a>
    </div>
</div>