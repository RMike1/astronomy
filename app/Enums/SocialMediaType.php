<?php

namespace App\Enums;

enum SocialMediaType: string
{
    case LINKEDIN='linkedin';
    case TWITTER='twitter';
    case INSTAGRAM='instagram';
    case YOUTUBE='youtube';
    case FACEBOOK='facebook';
    case TIKTOK='tiktok';
    case WHATSAPP='whatsapp';


    public function iconPath(): string
    {

        return match($this){
            self::LINKEDIN=>'<path d="M5,3c-1.105,0 -2,0.895 -2,2v14c0,1.105 0.895,2 2,2h14c1.105,0 2,-0.895 2,-2v-14c0,-1.105 -0.895,-2 -2,-2zM5,5h14v14h-14zM7.7793,6.31641c-0.857,0 -1.37109,0.51517 -1.37109,1.20117c0,0.686 0.51416,1.19922 1.28516,1.19922c0.857,0 1.37109,-0.51322 1.37109,-1.19922c0,-0.686 -0.51416,-1.20117 -1.28516,-1.20117zM6.47656,10v7h2.52344v-7zM11.08203,10v7h2.52344v-3.82617c0,-1.139 0.81264,-1.30273 1.05664,-1.30273c0.244,0 0.89649,0.24473 0.89649,1.30273v3.82617h2.44141v-3.82617c0,-2.197 -0.97627,-3.17383 -2.19727,-3.17383c-1.221,0 -1.87226,0.40656 -2.19726,0.97656v-0.97656z"></path>',
            self::TWITTER=>'<path d="M4.4043,3c-0.647,0 -1.02625,0.72877 -0.65625,1.25977l5.98828,8.55859l-6.01172,7.02734c-0.389,0.454 -0.06675,1.1543 0.53125,1.1543h0.66406c0.293,0 0.57172,-0.12856 0.76172,-0.35156l5.23828,-6.13672l3.94336,5.63477c0.375,0.534 0.98667,0.85352 1.63867,0.85352h3.33398c0.647,0 1.02625,-0.72781 0.65625,-1.25781l-6.31836,-9.04297l5.72656,-6.70898c0.332,-0.39 0.05497,-0.99023 -0.45703,-0.99023h-0.8457c-0.292,0 -0.56977,0.12761 -0.75977,0.34961l-4.8418,5.66016l-3.60156,-5.1543c-0.374,-0.536 -0.98467,-0.85547 -1.63867,-0.85547z"></path>',
            self::INSTAGRAM=>'<path d="M8,3c-2.75241,0 -5,2.24759 -5,5v8c0,2.75241 2.24759,5 5,5h8c2.75241,0 5,-2.24759 5,-5v-8c0,-2.75241 -2.24759,-5 -5,-5zM8,4.5h8c1.94159,0 3.5,1.55841 3.5,3.5v8c0,1.94159 -1.55841,3.5 -3.5,3.5h-8c-1.94159,0 -3.5,-1.55841 -3.5,-3.5v-8c0,-1.94159 1.55841,-3.5 3.5,-3.5zM17.25,6c-0.41421,0 -0.75,0.33579 -0.75,0.75c0,0.41421 0.33579,0.75 0.75,0.75c0.41421,0 0.75,-0.33579 0.75,-0.75c0,-0.41421 -0.33579,-0.75 -0.75,-0.75zM12,7c-1.60417,0 -2.90226,0.62857 -3.74805,1.58008c-0.84579,0.95151 -1.25195,2.19075 -1.25195,3.41992c0,1.22917 0.40617,2.46841 1.25195,3.41992c0.84579,0.95151 2.14388,1.58008 3.74805,1.58008c1.60417,0 2.90226,-0.62857 3.74805,-1.58008c0.84579,-0.95151 1.25195,-2.19075 1.25195,-3.41992c0,-1.22917 -0.40617,-2.46841 -1.25195,-3.41992c-0.84579,-0.95151 -2.14388,-1.58008 -3.74805,-1.58008zM12,8.5c1.22917,0 2.05608,0.43393 2.62695,1.07617c0.57088,0.64224 0.87305,1.528 0.87305,2.42383c0,0.89583 -0.30217,1.78159 -0.87305,2.42383c-0.57088,0.64224 -1.39779,1.07617 -2.62695,1.07617c-1.22917,0 -2.05607,-0.43393 -2.62695,-1.07617c-0.57088,-0.64224 -0.87305,-1.528 -0.87305,-2.42383c0,-0.89583 0.30217,-1.78159 0.87305,-2.42383c0.57088,-0.64224 1.39779,-1.07617 2.62695,-1.07617z"></path>',
            self::YOUTUBE=>'<path d="M12,4c0,0 -6.25445,-0.00003 -7.81445,0.41797c-0.861,0.23 -1.53758,0.90758 -1.76758,1.76758c-0.418,1.56 -0.41797,5.81445 -0.41797,5.81445c0,0 -0.00003,4.25445 0.41797,5.81445c0.23,0.861 0.90758,1.53758 1.76758,1.76758c1.56,0.418 7.81445,0.41797 7.81445,0.41797c0,0 6.25445,0.00003 7.81445,-0.41797c0.86,-0.23 1.53758,-0.90758 1.76758,-1.76758c0.418,-1.56 0.41797,-5.81445 0.41797,-5.81445c0,0 0.00003,-4.25445 -0.41797,-5.81445c-0.23,-0.86 -0.90758,-1.53758 -1.76758,-1.76758c-1.56,-0.418 -7.81445,-0.41797 -7.81445,-0.41797zM12,6c2.882,0 6.49087,0.13361 7.29688,0.34961c0.169,0.045 0.30752,0.18352 0.35352,0.35352c0.241,0.898 0.34961,3.63888 0.34961,5.29688c0,1.658 -0.10861,4.39787 -0.34961,5.29688c-0.045,0.169 -0.18352,0.30752 -0.35352,0.35352c-0.805,0.216 -4.41488,0.34961 -7.29687,0.34961c-2.881,0 -6.48987,-0.13361 -7.29687,-0.34961c-0.169,-0.045 -0.30752,-0.18352 -0.35352,-0.35352c-0.241,-0.898 -0.34961,-3.63888 -0.34961,-5.29687c0,-1.658 0.10861,-4.39883 0.34961,-5.29883c0.045,-0.168 0.18352,-0.30656 0.35352,-0.35156c0.805,-0.216 4.41488,-0.34961 7.29688,-0.34961zM10,8.53516v6.92969l6,-3.46484z"></path>',
            self::FACEBOOK=>'<path d="M11.666,2.005c-5.046,0.165 -9.292,4.246 -9.641,9.283c-0.369,5.329 3.442,9.832 8.481,10.589v-7.227h-1.614c-0.726,0 -1.314,-0.588 -1.314,-1.314v0c0,-0.726 0.588,-1.314 1.314,-1.314h1.613v-1.749c0,-2.896 1.411,-4.167 3.818,-4.167c0.357,0 0.662,0.008 0.921,0.021c0.636,0.031 1.129,0.561 1.129,1.198v0c0,0.663 -0.537,1.2 -1.2,1.2h-0.442c-1.022,0 -1.379,0.969 -1.379,2.061v1.437h1.87c0.591,0 1.043,0.527 0.953,1.111l-0.108,0.701c-0.073,0.47 -0.477,0.817 -0.953,0.817h-1.762v7.247c4.883,-0.663 8.648,-4.837 8.648,-9.899c0,-5.634 -4.659,-10.179 -10.334,-9.995z"></path>',
            self::TIKTOK=>'<path d="M6,3c-1.64497,0 -3,1.35503 -3,3v12c0,1.64497 1.35503,3 3,3h12c1.64497,0 3,-1.35503 3,-3v-12c0,-1.64497 -1.35503,-3 -3,-3zM6,5h12c0.56503,0 1,0.43497 1,1v12c0,0.56503 -0.43497,1 -1,1h-12c-0.56503,0 -1,-0.43497 -1,-1v-12c0,-0.56503 0.43497,-1 1,-1zM12,7v7c0,0.56503 -0.43497,1 -1,1c-0.56503,0 -1,-0.43497 -1,-1c0,-0.56503 0.43497,-1 1,-1v-2c-1.64497,0 -3,1.35503 -3,3c0,1.64497 1.35503,3 3,3c1.64497,0 3,-1.35503 3,-3v-3.76758c0.61615,0.43892 1.25912,0.76758 2,0.76758v-2c-0.04733,0 -0.73733,-0.21906 -1.21875,-0.63867c-0.48142,-0.41961 -0.78125,-0.94634 -0.78125,-1.36133z"></path>',
            self::WHATSAPP=>'<path d="M12.01172,2c-5.506,0 -9.98823,4.47838 -9.99023,9.98438c-0.001,1.76 0.45998,3.47819 1.33398,4.99219l-1.35547,5.02344l5.23242,-1.23633c1.459,0.796 3.10144,1.21384 4.77344,1.21484h0.00391c5.505,0 9.98528,-4.47937 9.98828,-9.98437c0.002,-2.669 -1.03588,-5.17841 -2.92187,-7.06641c-1.886,-1.887 -4.39245,-2.92673 -7.06445,-2.92773zM12.00977,4c2.136,0.001 4.14334,0.8338 5.65234,2.3418c1.509,1.51 2.33794,3.51639 2.33594,5.65039c-0.002,4.404 -3.58423,7.98633 -7.99023,7.98633c-1.333,-0.001 -2.65341,-0.3357 -3.81641,-0.9707l-0.67383,-0.36719l-0.74414,0.17578l-1.96875,0.46484l0.48047,-1.78516l0.2168,-0.80078l-0.41406,-0.71875c-0.698,-1.208 -1.06741,-2.58919 -1.06641,-3.99219c0.002,-4.402 3.58528,-7.98437 7.98828,-7.98437zM8.47656,7.375c-0.167,0 -0.43702,0.0625 -0.66602,0.3125c-0.229,0.249 -0.875,0.85208 -0.875,2.08008c0,1.228 0.89453,2.41503 1.01953,2.58203c0.124,0.166 1.72667,2.76563 4.26367,3.76563c2.108,0.831 2.53614,0.667 2.99414,0.625c0.458,-0.041 1.47755,-0.60255 1.68555,-1.18555c0.208,-0.583 0.20848,-1.0845 0.14648,-1.1875c-0.062,-0.104 -0.22852,-0.16602 -0.47852,-0.29102c-0.249,-0.125 -1.47608,-0.72755 -1.70508,-0.81055c-0.229,-0.083 -0.3965,-0.125 -0.5625,0.125c-0.166,0.25 -0.64306,0.81056 -0.78906,0.97656c-0.146,0.167 -0.29102,0.18945 -0.54102,0.06445c-0.25,-0.126 -1.05381,-0.39024 -2.00781,-1.24024c-0.742,-0.661 -1.24267,-1.47656 -1.38867,-1.72656c-0.145,-0.249 -0.01367,-0.38577 0.11133,-0.50977c0.112,-0.112 0.24805,-0.2915 0.37305,-0.4375c0.124,-0.146 0.167,-0.25002 0.25,-0.41602c0.083,-0.166 0.04051,-0.3125 -0.02149,-0.4375c-0.062,-0.125 -0.54753,-1.35756 -0.76953,-1.85156c-0.187,-0.415 -0.3845,-0.42464 -0.5625,-0.43164c-0.145,-0.006 -0.31056,-0.00586 -0.47656,-0.00586z"></path>',
        };
    }
}
