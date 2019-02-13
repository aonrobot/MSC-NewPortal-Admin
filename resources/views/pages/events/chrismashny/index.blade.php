<style>

.text-box {
  position: relative;
  overflow: hidden;
}

.text {
  position: relative;
  bottom: 50px;
}
.text__error {
  position: relative;
  bottom: 0;
  display: block;
  font-size: 25px;
  margin: 0;
  text-align: center;
  box-sizing: border-box;
  color: #fefefe;
}
.text__error:first-of-type {
  margin-bottom: 20px;
}
.text__error span {
  margin: 0 2px;
  font-weight: bold;
}
.text__error span:nth-child(1n) {
  color: #d40000;
}
.text__error span:nth-child(2n) {
  color: #fed429;
}
.text__error span:nth-child(3n) {
  color: #008002;
}

.status-code {
  position: relative;
  display: flex;
  justify-content: space-between;
  width: 515px;
  max-width: 595px;
  margin: auto;
}
.status-code p {
  font-size: 250px;
  margin: 3px 0 0 0;
  color: #fefefe;
  opacity: 0.8;
}

.zero {
  position: absolute;
  top: 48px;
  left: calc(50% - 85px);
  width: 170px;
  height: 190px;
}
.zero__top {
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  box-sizing: border-box;
  overflow: hidden;
  z-index: 20;
}
.zero__top-inner {
  position: absolute;
  top: 0;
  left: 0;
  width: 170px;
  height: 100%;
  border: 33px solid #fefefe;
  box-sizing: border-box;
  border-radius: 50%;
  opacity: 0.8;
}
.zero__bottom {
  position: absolute;
  top: 0;
  right: 0;
  width: 50%;
  height: 100%;
  overflow: hidden;
}
.zero__bottom-inner {
  position: absolute;
  top: 0;
  right: 0;
  width: 170px;
  height: 100%;
  border: 33px solid #fefefe;
  box-sizing: border-box;
  border-radius: 50%;
  opacity: 0.8;
}

.house {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 300px;
  height: 309px;
  z-index: 0;
  overflow: hidden;
}
.house__roof {
  position: absolute;
  top: 0;
  left: 0;
}
.house__roof--trapezoid {
  top: -30px;
  left: 121px;
  width: 112px;
  height: 45px;
  z-index: 8;
  background-color: #660f14;
}
.house__roof--trapezoid:before, .house__roof--trapezoid:after {
  content: "";
  position: absolute;
  top: 0;
  border-bottom: 45px solid #660f14;
  border-left: 6px solid transparent;
  border-right: 0 solid transparent;
}
.house__roof--trapezoid:before {
  left: -6px;
  border-bottom-width: 45px;
  border-left-width: 6px;
  border-right-width: 0;
}
.house__roof--trapezoid:after {
  right: -20px;
  border-bottom-width: 45px;
  border-right-width: 20px;
  border-left-width: 0;
}
.house__roof--trapezoid .snow {
  top: -2px;
  left: -2px;
  width: 120px;
  height: 20px;
  border-radius: 8px;
}
.house__roof--trapezoid .snow:before {
  top: 8px;
  left: 0;
  width: 65px;
  height: 28px;
  border-radius: 0 0 20px 40px;
}
.house__roof--trapezoid .snow:after {
  top: 11px;
  left: 58px;
  width: 66px;
  height: 26px;
  border-radius: 0px 10px 20px 40px;
  -webkit-transform: rotate(-17deg);
          transform: rotate(-17deg);
}
.house__roof--triangle {
  width: 0;
  height: 0;
  border-bottom: 95px solid #fe9051;
  border-left: 135px solid transparent;
  border-right: 135px solid transparent;
}
.house__roof--triangle:before, .house__roof--triangle:after {
  content: "";
  position: absolute;
  border-radius: 10px;
  border: none;
  background-color: #660f14;
  z-index: 8;
}
.house__roof--triangle:before {
  top: -34px;
  left: -73px;
  width: 8px;
  height: 177px;
  -webkit-transform: rotate(54deg);
          transform: rotate(54deg);
}
.house__roof--triangle:after {
  top: -35px;
  left: 63px;
  width: 8px;
  height: 177px;
  -webkit-transform: rotate(-54deg);
          transform: rotate(-54deg);
}
.house__roof--triangle .snow {
  width: 0;
  height: 0;
}
.house__roof--triangle .snow:before {
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
  top: -30px;
  left: -48px;
  height: 128px;
  width: 10px;
  border-radius: 8px 8px 2px 8px;
}
.house__roof--triangle .snow:after {
  content: "";
  position: absolute;
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
  top: -31px;
  left: 37px;
  height: 128px;
  width: 10px;
  border-radius: 8px 8px 8px 2px;
}
.house__bottom {
  position: absolute;
  bottom: 0;
  left: 35px;
  background-color: #c4996f;
  width: 225px;
  height: 150px;
}
.house__bottom:before {
  content: "";
  position: absolute;
  bottom: 0;
  right: -20px;
  width: 0;
  height: 0;
  border-top: 150px solid #c4996f;
  border-right: 20px solid transparent;
  border-left: 67px solid transparent;
}
.house__bottom:after {
  content: "";
  position: absolute;
  bottom: 0;
  left: -20px;
  width: 0;
  height: 0;
  border-top: 230px solid #c4996f;
  border-left: 20px solid transparent;
  border-right: 67px solid transparent;
}
.house__bottom .house__window {
  top: 50px;
  left: 135px;
  width: 78px;
  height: 50px;
}
.house__bottom .house__window:after {
  width: 78px;
  height: 4px;
}
.house__window {
  position: absolute;
  width: 50px;
  height: 50px;
  background-color: #4f5a46;
  overflow: hidden;
  border-radius: 5px;
}
.house__window:before, .house__window:after {
  content: "";
  position: absolute;
  background-color: #c4996f;
  z-index: 10;
}
.house__window:before {
  top: 0;
  left: calc(50% - 2px);
  width: 4px;
  height: 50px;
}
.house__window:after {
  top: calc(50% - 2px);
  left: 0;
  width: 50px;
  height: 4px;
}
.house__door {
  position: absolute;
  bottom: 0;
  left: 24px;
  width: 60px;
  height: 95px;
  background-color: #660f14;
  z-index: 10;
}
.house__door:before {
  content: "";
  position: absolute;
  top: calc(50% - 4px);
  left: 4px;
  background-color: #a76c00;
  width: 9px;
  height: 9px;
  border-radius: 50%;
}
.house__chimney {
  position: absolute;
  top: 5px;
  left: 106px;
  width: 55px;
  height: 90px;
  background-color: #660f14;
}
.house__chimney:before {
  content: "";
  position: absolute;
  top: -3px;
  left: -2px;
  width: 103%;
  height: 13px;
  border-radius: 7px;
  background-color: #fff;
}
.house__chimney .snow {
  width: 17px;
  height: 14px;
  top: 5px;
  left: -2px;
  border-radius: 0 30px 30px 30px;
}
.house__chimney .snow:before {
  width: 43px;
  height: 29px;
  top: -8px;
  left: 16px;
  border-radius: 0 10px 30px 30px;
}
.house--first-floor {
  left: calc(100% - 300px);
}
.house--first-floor .lease {
  top: 115px;
  left: 115px;
  z-index: 20;
}
.house--first-floor .house__bottom {
  background-color: #d97b09;
}
.house--first-floor .house__bottom .house__roof--triangle {
  top: -87px;
  left: -22px;
  border-bottom: 95px solid #d97b09;
  border-left-width: 135px;
  border-right-width: 135px;
}
.house--first-floor .house__bottom .house__roof--triangle:before {
  top: -34px;
  left: -73px;
  height: 177px;
}
.house--first-floor .house__bottom .house__roof--triangle:after {
  top: -35px;
  left: 63px;
  height: 177px;
}
.house--first-floor .house__bottom .house__roof--triangle .snow:before {
  -webkit-transform: rotate(54deg);
          transform: rotate(54deg);
  top: -45px;
  left: -77px;
  height: 183px;
}
.house--first-floor .house__bottom .house__roof--triangle .snow:after {
  -webkit-transform: rotate(-54deg);
          transform: rotate(-54deg);
  top: -44px;
  left: 66px;
  height: 183px;
}
.house--first-floor .house__bottom:before {
  border-top-color: #d97b09;
}
.house--first-floor .house__bottom:after {
  left: -20px;
  border-top: 150px solid #d97b09;
  border-left: 20px solid transparent;
  border-right: 0 solid transparent;
}
.house--first-floor .house__bottom .house__window {
  left: 118px;
  width: 95px;
}
.house--first-floor .house__bottom .house__window:before, .house--first-floor .house__bottom .house__window:after {
  background-color: #d97b09;
}
.house--first-floor .house__bottom .house__window:after {
  width: 95px;
}
.house--first-floor .house__chimney {
  top: 71px;
  left: 32px;
  width: 75px;
}
.house--first-floor .house__chimney .snow {
  width: 43px;
  height: 27px;
  top: 2px;
  left: -2px;
  border-radius: 0 10px 30px 30px;
}
.house--first-floor .house__chimney .snow:before {
  width: 38px;
  height: 18px;
  top: 2px;
  left: 39px;
  border-radius: 10px 0 30px 30px;
}
.house--second-floor {
  width: 395px;
}
.house--second-floor .house__top {
  position: absolute;
  top: 90px;
  left: 35px;
  background-color: #c4996f;
  width: 118px;
  height: 80px;
}
.house--second-floor .house__top:before {
  content: "";
  position: absolute;
  top: 0;
  right: -8px;
  width: 0;
  height: 0;
  border-top: 80px solid #c4996f;
  border-right: 8px solid transparent;
  border-left: 0 solid transparent;
}
.house--second-floor .house__top .house__roof--triangle {
  top: -70px;
  left: -20px;
  border-bottom: 70px solid #c4996f;
  border-left-width: 73px;
  border-right-width: 73px;
}
.house--second-floor .house__top .house__roof--triangle:before {
  top: -19px;
  left: -44px;
  height: 120px;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}
.house--second-floor .house__top .house__roof--triangle:after {
  top: -19px;
  left: 35px;
  height: 120px;
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.house--second-floor .house__top .house__roof--triangle .snow:before {
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
  top: -30px;
  left: -48px;
  height: 128px;
  z-index: 10;
}
.house--second-floor .house__top .house__roof--triangle .snow:after {
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
  top: -31px;
  left: 37px;
  height: 128px;
}
.house--second-floor .house__top .house__window {
  top: 0;
  left: 27px;
  width: 50px;
  height: 50px;
}

.snow {
  position: absolute;
  background-color: #fff;
  z-index: 10;
}
.snow:before, .snow:after {
  content: "";
  position: absolute;
  background-color: #fff;
  z-index: 10;
}

.tree {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.tree__body {
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  border-bottom: 22px solid #008002;
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;
}
.tree__body:before {
  content: "";
  position: absolute;
  top: 10px;
  left: -25px;
  width: 0;
  height: 0;
  border-bottom: 27px solid #008002;
  border-left: 26px solid transparent;
  border-right: 25px solid transparent;
}
.tree__body:after {
  content: "";
  position: absolute;
  top: 23px;
  left: -30px;
  width: 0;
  height: 0;
  border-bottom: 30px solid #008002;
  border-left: 31px solid transparent;
  border-right: 31px solid transparent;
}
.tree__decoration {
  position: absolute;
  top: 13px;
  left: 10px;
  width: 3px;
  height: 3px;
  border-radius: 50%;
  background: radial-gradient(#b0e2f9, #54bab6);
  -webkit-transform: scale(1.6);
          transform: scale(1.6);
}
.tree__decoration:before {
  background: radial-gradient(#54bab6 0%, rgba(242, 191, 81, 0) 70%);
  borer-radius: 50%;
  content: "";
  display: block;
  height: 8px;
  opacity: 0.5;
  -webkit-transform: translate3d(-5px, -5px, 0) scale(1);
          transform: translate3d(-5px, -5px, 0) scale(1);
  width: 8px;
  -webkit-animation: decoration 2s 2s infinite;
          animation: decoration 2s 2s infinite;
}
.tree__decoration:nth-of-type(2) {
  top: 11px;
  left: 24px;
}
.tree__decoration:nth-of-type(2):before {
  -webkit-animation: decoration 1s 3s infinite;
          animation: decoration 1s 3s infinite;
}
.tree__decoration:nth-of-type(3) {
  top: 40px;
  left: 9px;
}
.tree__decoration:nth-of-type(3):before {
  -webkit-animation: decoration 2s 2s infinite;
          animation: decoration 2s 2s infinite;
}
.tree__decoration:nth-of-type(4) {
  top: 26px;
  left: 18px;
}
.tree__decoration:nth-of-type(4):before {
  -webkit-animation: decoration 1s 3s infinite;
          animation: decoration 1s 3s infinite;
}
.tree__decoration:nth-of-type(5) {
  top: 42px;
  left: 30px;
}
.tree__decoration:nth-of-type(5):before {
  -webkit-animation: decoration 2s 2s infinite;
          animation: decoration 2s 2s infinite;
}

.cat {
  position: absolute;
  top: 0;
  right: 43px;
  opacity: 0;
}
.cat__face {
  position: absolute;
  top: 32px;
  left: 0;
  width: 18px;
  height: 16px;
  border-radius: 50%;
  background-color: #000;
}
.cat__face:before, .cat__face:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  border-bottom: 8px solid #000;
  border-right: 14px solid transparent;
  border-left: 2px solid transparent;
}
.cat__face:before {
  top: -3px;
  left: -1px;
  -webkit-transform: rotate(-14deg);
          transform: rotate(-14deg);
}
.cat__face:after {
  top: 1px;
  left: 10px;
  -webkit-transform: rotate(54deg);
          transform: rotate(54deg);
}
.cat__body {
  position: absolute;
  top: 39px;
  left: 4px;
  width: 40px;
  height: 20px;
  border-radius: 50%;
  background-color: #000;
}
.cat__body:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  border-bottom: 8px solid #000;
  border-right: 14px solid transparent;
  border-left: 2px solid transparent;
}

.present {
  position: absolute;
  bottom: 0;
  left: 3px;
  width: 38px;
  height: 17px;
  background-color: #6b9c27;
  opacity: 0;
}
.present:before, .present:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
}
.present:before {
  top: 0;
  left: 16px;
  background-color: #d63527;
  width: 5px;
  height: 17px;
}
.present:after {
  top: -10px;
  left: 16px;
  background-color: #d63527;
  width: 6px;
  height: 38px;
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
}
.present__ribbon:before {
  content: "";
  position: absolute;
  top: -6px;
  right: 10px;
  border-bottom: 6px solid #d63527;
  border-right: 0px solid transparent;
  border-left: 10px solid transparent;
}
.present__ribbon:after {
  content: "";
  position: absolute;
  top: -6px;
  left: 10px;
  border-bottom: 6px solid #d63527;
  border-left: 0px solid transparent;
  border-right: 10px solid transparent;
}

.lease {
  position: absolute;
  top: 0;
  left: 0;
  width: 30px;
  height: 30px;
  border: 15px solid green;
  border-radius: 50%;
  background-color: transparent;
}
.lease__ribbon {
  position: absolute;
  top: 0;
  left: calc(50% - 4px);
  width: 8px;
  height: 7px;
  border-radius: 8px;
  background-color: #d63527;
}
.lease__ribbon:before {
  content: "";
  position: absolute;
  top: -7px;
  left: -10px;
  border-left: 16px solid #d63527;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}
.lease__ribbon:after {
  content: "";
  position: absolute;
  top: -7px;
  left: 2px;
  border-right: 16px solid #d63527;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}
.lease__decoration {
  position: absolute;
  top: 0;
  left: 0;
}
.lease__decoration-part {
  position: absolute;
  top: 0;
  left: 0;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background-color: #fed429;
}
.lease__decoration-part:before, .lease__decoration-part:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background-color: #c74734;
}
.lease__decoration-part:nth-of-type(1) {
  top: -11px;
}
.lease__decoration-part:nth-of-type(1):before {
  top: 12px;
  left: -11px;
  background-color: #c74734;
}
.lease__decoration-part:nth-of-type(1):after {
  content: none;
}
.lease__decoration-part:nth-of-type(2) {
  top: 20px;
  left: -10px;
}
.lease__decoration-part:nth-of-type(2):before {
  top: 12px;
  left: 12px;
}
.lease__decoration-part:nth-of-type(2):after {
  top: 10px;
  left: 33px;
  background-color: #fed429;
}
.lease__decoration-part:nth-of-type(3) {
  top: 1px;
  left: 31px;
}
.lease__decoration-part:nth-of-type(3):before {
  top: 16px;
  left: 5px;
}
.lease__decoration-part:nth-of-type(3):after {
  top: -13px;
  left: -13px;
}

.snowman {
  position: absolute;
  bottom: -32px;
  right: 0;
  width: 137px;
  height: 145px;
  z-index: 10;
  overflow: hidden;
}
.snowman__hat {
  position: absolute;
  top: -64px;
  left: 36px;
  width: 20px;
  height: 15px;
  background-color: #87d3dd;
  -webkit-transform: rotate(15deg);
          transform: rotate(15deg);
  border-radius: 2px;
  z-index: 10;
}
.snowman__hat:before {
  content: "";
  position: absolute;
  width: 12px;
  height: 8px;
  top: 0px;
  left: 0px;
  border-radius: 5px 0 30px 30px;
  background-color: #fff;
}
.snowman__hat:after {
  content: "";
  position: absolute;
  width: 11px;
  height: 10px;
  top: 0px;
  left: 10px;
  border-radius: 0 16px 30px 30px;
  background-color: #fff;
}
.snowman__body {
  position: absolute;
  top: 105px;
  left: -9px;
  width: 85px;
  height: 66px;
  border-radius: 50%;
  background-color: #fff;
}
.snowman__body:before {
  content: "";
  position: absolute;
  top: -24px;
  left: 18px;
  width: 45px;
  height: 40px;
  border-radius: 50%;
  background-color: #fff;
}
.snowman__body:after {
  content: "";
  position: absolute;
  top: -53px;
  left: 22px;
  width: 35px;
  height: 35px;
  border-radius: 50%;
  background-color: #fff;
}
.snowman__face {
  position: absolute;
  top: -45px;
  left: 31px;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background-color: #000;
  z-index: 10;
}
.snowman__face:before {
  content: "";
  position: absolute;
  top: 2px;
  left: 12px;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background-color: #000;
  z-index: 10;
}
.snowman__face:after {
  content: "";
  position: absolute;
  top: 7px;
  left: -4px;
  width: 0px;
  height: 0px;
  border-top: 1px solid transparent;
  border-bottom: 3px solid transparent;
  border-right: 12px solid #fe9051;
  -webkit-transform: rotate(10deg);
          transform: rotate(10deg);
}
.snowman__hand {
  position: absolute;
  top: -28px;
  left: 15px;
  width: 3px;
  height: 15px;
  background-color: #8e6428;
}
.snowman__hand--left {
  -webkit-transform: rotate(-62deg);
          transform: rotate(-62deg);
}
.snowman__hand--right {
  -webkit-transform: rotate(62deg);
          transform: rotate(62deg);
  left: 63px;
}
.snowman__scarf {
  position: absolute;
  top: -25px;
  left: 23px;
  width: 34px;
  height: 8px;
  border-radius: 4px 4px 8px 8px;
  background-color: #c74734;
  z-index: 10;
}
.snowman__scarf:before {
  content: "";
  position: absolute;
  top: 5px;
  right: 3px;
  width: 9px;
  height: 19px;
  border-radius: 4px;
  background-color: #c74734;
}
.snowman__scarf:after {
  content: "";
  -webkit-transform: rotate(15deg);
          transform: rotate(15deg);
  position: absolute;
  top: 1px;
  right: 4px;
  width: 9px;
  height: 23px;
  border-radius: 4px;
  background-color: #c74734;
}
.snowman .hukidashi {
  top: 0;
  right: 2px;
  width: 100px;
  height: 53px;
}
.snowman .hukidashi:before {
  left: 23px;
  bottom: -2px;
  -webkit-transform: rotate(0);
          transform: rotate(0);
}
.snowman .hukidashi p {
  margin: 11px 0;
}

.santa {
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 125px;
  height: 107px;
  z-index: 10;
}
.santa--walk {
  -webkit-animation: santa-walk 20s linear normal infinite;
          animation: santa-walk 20s linear normal infinite;
}
.santa--walk .hukidashi {
  top: -23px;
  left: -31px;
  -webkit-animation: santa-walk-hukidashi 20s linear normal infinite;
          animation: santa-walk-hukidashi 20s linear normal infinite;
}
.santa--walk .sweat {
  -webkit-animation: sweat 1s linear normal infinite;
          animation: sweat 1s linear normal infinite;
}
.santa--walk .sweat:nth-of-type(2) {
  top: -1px;
  right: 20px;
  -webkit-animation: sweat2 1s linear normal infinite;
          animation: sweat2 1s linear normal infinite;
}
.santa--sori {
  bottom: 0;
  left: 0;
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
}
.santa--sori:before, .santa--sori:after {
  content: "";
  position: absolute;
  bottom: 0;
  background-color: #115a8d;
}
.santa--sori:before {
  left: -10px;
  width: 126px;
  height: 30px;
  border-radius: 10px 50% 10px 50%;
  -webkit-transform: rotate(0);
          transform: rotate(0);
  z-index: 10;
}
.santa--sori:after {
  left: 70px;
  width: 50px;
  height: 53px;
  border-radius: 50% 10px 22px 10px;
  -webkit-transform: rotate(8deg);
          transform: rotate(8deg);
}
.santa--sori .santa__hand--left .santa__hand-inner {
  -webkit-animation: sori-santa-hand-right 1s linear alternate infinite;
          animation: sori-santa-hand-right 1s linear alternate infinite;
}
.santa--sori .santa__hand--right {
  -webkit-transform: rotate(25deg);
          transform: rotate(25deg);
  border-radius: 10px;
  height: 7px;
  -webkit-animation: sori-santa-hand-left 1s linear alternate infinite;
          animation: sori-santa-hand-left 1s linear alternate infinite;
}
.santa--sori .santa__hand--right:before {
  content: "";
  position: absolute;
  width: 8px;
  height: 7px;
  top: -2px;
  left: -6px;
  background-color: #000;
  border-radius: 50%;
  -webkit-transform: rotate(10deg);
          transform: rotate(10deg);
}
.santa--sori .santa__foot {
  display: none;
}
.santa--chimney {
  top: 15px;
  left: 26px;
  height: 55px;
  left: 8px;
  z-index: 0;
  -webkit-animation: santa-chimney 8s linear normal infinite;
          animation: santa-chimney 8s linear normal infinite;
}
.santa--chimney:before, .santa--chimney:after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 10px;
  height: 8px;
  border-radius: 50%;
  background-color: #000;
  z-index: 20;
}
.santa--chimney:before {
  bottom: -4px;
  left: 33px;
}
.santa--chimney:after {
  bottom: -4px;
  left: 73px;
}
.santa--chimney .santa__face {
  -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
  left: 42px;
}
.santa--chimney .santa__hat {
  -webkit-transform: rotate(-9deg);
          transform: rotate(-9deg);
}
.santa--chimney .santa__beard {
  -webkit-transform: rotate(-3deg);
          transform: rotate(-3deg);
}
.santa--chimney .santa__eyebrows--right {
  top: 1px;
  left: 24px;
}
.santa--chimney .santa__eye--right {
  left: 23px;
}
.santa--chimney .santa__eye--left {
  left: 4px;
}
.santa--chimney .santa__nose {
  left: 9px;
}
.santa--chimney .santa__cheek--right {
  top: 12px;
  left: 26px;
}
.santa--chimney .santa__body:before {
  content: none;
}
.santa--chimney .santa__hand {
  display: none;
}
.santa__hat-part {
  position: absolute;
  top: 7px;
  left: 31px;
  width: 43px;
  height: 58px;
  border-radius: 50%;
  -webkit-transform: rotate(28deg);
          transform: rotate(28deg);
  background-color: #d63527;
}
.santa__hat-part:before, .santa__hat-part:after {
  content: "";
  position: absolute;
}
.santa__hat-part:nth-of-type(1):before {
  top: 9px;
  left: 45px;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background-color: #fff;
}
.santa__hat-part:nth-of-type(1):after {
  top: 3px;
  left: 19px;
  width: 30px;
  height: 7px;
  border-radius: 50%;
  -webkit-transform: rotate(22deg);
          transform: rotate(22deg);
  background-color: #d63527;
}
.santa__hat-part:nth-of-type(2) {
  position: absolute;
  top: 18px;
  left: 31px;
  width: 44px;
  height: 34px;
  border-radius: 50%;
  -webkit-transform: rotate(12deg);
          transform: rotate(12deg);
  background-color: #fff;
}
.santa__face {
  position: absolute;
  top: 25px;
  left: 37px;
  width: 31px;
  height: 17px;
  border-radius: 20px 20px 50% 50%;
  -webkit-transform: rotate(10deg);
          transform: rotate(10deg);
  background-color: #fde2b7;
  z-index: 10;
}
.santa__beard-part {
  position: absolute;
  top: 8px;
  left: -14px;
  width: 15px;
  height: 17px;
  border-radius: 50%;
  background-color: #fff;
}
.santa__beard-part:before, .santa__beard-part:after {
  content: "";
  position: absolute;
  background-color: #fff;
}
.santa__beard-part:before {
  top: 12px;
  left: 1px;
  width: 15px;
  height: 17px;
  border-radius: 50%;
}
.santa__beard-part:nth-of-type(2) {
  top: 16px;
  left: -8px;
  width: 26px;
  height: 30px;
}
.santa__beard-part:nth-of-type(2):before {
  top: 16px;
  left: 13px;
  width: 19px;
  height: 17px;
}
.santa__beard-part:nth-of-type(2):after {
  top: 1px;
  left: 13px;
  width: 19px;
  height: 17px;
}
.santa__beard-part:nth-of-type(3) {
  top: 16px;
  left: 14px;
  width: 27px;
  height: 28px;
}
.santa__beard-part:nth-of-type(3):before {
  top: -4px;
  left: 13px;
  width: 17px;
  height: 17px;
}
.santa__eyebrows {
  position: absolute;
  top: 0;
  left: 0;
  width: 2px;
  height: 7px;
  border-radius: 50%;
  background-color: #fff;
}
.santa__eyebrows--left {
  top: 1px;
  left: 4px;
  -webkit-transform: rotate(65deg);
          transform: rotate(65deg);
}
.santa__eyebrows--right {
  top: 2px;
  left: 22px;
  -webkit-transform: rotate(-65deg);
          transform: rotate(-65deg);
}
.santa__eye {
  position: absolute;
  top: 8px;
  left: 2px;
  width: 3px;
  height: 4px;
  border-radius: 50%;
  background-color: #000;
}
.santa__eye--left {
  top: 8px;
  left: 2px;
}
.santa__eye--right {
  top: 8px;
  left: 20px;
}
.santa__nose {
  position: absolute;
  top: 10px;
  left: 6px;
  width: 12px;
  height: 9px;
  border-radius: 50%;
  z-index: 10;
  background-color: #f7d194;
}
.santa__cheek {
  position: absolute;
  top: 10px;
  left: 6px;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  z-index: 10;
  background-color: #f4cfe3;
}
.santa__cheek--left {
  top: 12px;
  left: -3px;
}
.santa__cheek--right {
  top: 13px;
  left: 22px;
}
.santa__body {
  position: absolute;
  top: 54px;
  left: 16px;
  width: 88px;
  height: 53px;
}
.santa__body:before {
  content: "";
  position: absolute;
  top: -23px;
  right: -10px;
  width: 53px;
  height: 51px;
  border-radius: 42% 50%;
  background-color: #f3f0f0;
  z-index: -1;
}
.santa__body-top {
  top: -3px;
  left: 10px;
  position: absolute;
  width: 45px;
  height: 39px;
  border-radius: 50% 50% 10% 10%;
  background-color: #d63527;
  z-index: 5;
}
.santa__body-top:before {
  content: "";
  top: 28px;
  left: 0px;
  position: absolute;
  width: 45px;
  height: 5px;
  background-color: #000;
  -webkit-transform: rotate(1deg);
          transform: rotate(1deg);
}
.santa__body-top:after {
  content: "";
  top: 27px;
  left: 10px;
  position: absolute;
  width: 7px;
  height: 5px;
  background-color: #000;
  border: 1px solid #fff;
  border-radius: 3px;
  -webkit-transform: rotate(1deg);
          transform: rotate(1deg);
}
.santa__body-bottom {
  position: absolute;
  top: 18px;
  left: 10px;
  width: 44px;
  height: 23px;
  border-radius: 50%;
  background-color: #d63527;
}
.santa__foot {
  position: absolute;
  bottom: -7px;
  left: 23px;
  width: 10px;
  height: 17px;
  border-radius: 3px;
  -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
  background-color: #d63527;
}
.santa__foot:before, .santa__foot:after {
  content: "";
  position: absolute;
  background-color: #000;
}
.santa__foot:before {
  bottom: -3px;
  left: 0;
  height: 7px;
}
.santa__foot:after {
  width: 15px;
  height: 6px;
  bottom: -5px;
  left: -3px;
  border-radius: 50% 50% 50% 4px;
}
.santa__foot--left {
  bottom: -7px;
  left: 6px;
  -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
  -webkit-animation: santa-foot-left 0.8s linear alternate infinite;
          animation: santa-foot-left 0.8s linear alternate infinite;
}
.santa__foot--left:before {
  width: 10px;
}
.santa__foot--left:after {
  width: 13px;
}
.santa__foot--right {
  width: 12px;
  bottom: -7px;
  left: 26px;
  -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
  -webkit-animation: santa-foot-right 0.8s linear alternate infinite;
          animation: santa-foot-right 0.8s linear alternate infinite;
}
.santa__foot--right:before {
  width: 12px;
}
.santa__foot--right:after {
  width: 15px;
}
.santa__hand {
  position: absolute;
}
.santa__hand--left {
  top: 5px;
  left: 19px;
  width: 33px;
  height: 30px;
  overflow: hidden;
}
.santa__hand--left .santa__hand-inner {
  position: absolute;
  top: 10px;
  left: 8px;
  width: 49px;
  z-index: 100;
  height: 7px;
  border-radius: 10px;
  -webkit-transform: rotate(12deg);
          transform: rotate(12deg);
  background-color: #d63527;
  -webkit-animation: santa-hand-left 1s linear alternate infinite;
          animation: santa-hand-left 1s linear alternate infinite;
}
.santa__hand--left .santa__hand-inner:before {
  content: "";
  position: absolute;
  width: 8px;
  height: 7px;
  top: -2px;
  left: -6px;
  background-color: #000;
  border-radius: 50%;
  -webkit-transform: rotate(25deg);
          transform: rotate(25deg);
}
.santa__hand--right {
  top: 4px;
  left: 3px;
  width: 11px;
  height: 8px;
  -webkit-transform: rotate(-60deg);
          transform: rotate(-60deg);
  border-radius: 50%;
  background-color: #d63527;
}

.sori-santa {
  position: absolute;
  top: -16px;
  width: 295px;
  height: 155px;
  -webkit-transform: rotate(-1deg);
          transform: rotate(-1deg);
  -webkit-animation: sori-santa 8s linear normal infinite;
          animation: sori-santa 8s linear normal infinite;
}

.lead {
  position: absolute;
  top: 92px;
  left: 84px;
  width: 182px;
  height: 33px;
  overflow: hidden;
  z-index: 10;
  -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
  -webkit-animation: sori-santa-lead-right 1s linear alternate infinite;
          animation: sori-santa-lead-right 1s linear alternate infinite;
}
.lead--back {
  top: 85px;
  left: 105px;
  width: 149px;
  -webkit-transform: rotate(4deg);
          transform: rotate(4deg);
  z-index: 0;
  -webkit-animation: sori-santa-lead-left 1s linear alternate infinite;
          animation: sori-santa-lead-left 1s linear alternate infinite;
}
.lead-inner {
  position: absolute;
  bottom: 0;
  left: -12px;
  width: 100%;
  height: 48px;
  border-bottom: 1px solid #fff;
  border-radius: 50%;
}

.sori {
  position: absolute;
  bottom: -12px;
  left: 0px;
  width: 145px;
  height: 11px;
  -webkit-transform: rotate(-3deg);
          transform: rotate(-3deg);
  border-bottom: 5px solid #690e00;
  border-right: 5px solid #690e00;
  border-radius: 10px;
  z-index: 10;
}
.sori:before, .sori:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 5px;
  height: 5px;
  background-color: #690e00;
}
.sori:before {
  top: 2px;
  left: 34px;
  height: 9px;
}
.sori:after {
  top: 3px;
  left: 108px;
  width: 5px;
  height: 8px;
}

.reindeer {
  position: absolute;
  width: 115px;
  height: 155px;
  right: 0;
  top: 20px;
  -webkit-transform: rotate(14deg);
          transform: rotate(14deg);
  z-index: 0;
}
.reindeer:before {
  content: "";
  position: absolute;
  top: 65px;
  left: 76px;
  width: 8px;
  height: 31px;
  background-color: #115a8d;
  z-index: 10;
  -webkit-transform: rotate(-55deg);
          transform: rotate(-55deg);
}
.reindeer:after {
  content: "";
  position: absolute;
}
.reindeer__face {
  position: absolute;
  width: 30px;
  height: 22px;
  top: 44px;
  left: 72px;
  border-radius: 10px 10px 50% 50%;
  -webkit-transform: rotate(-3deg);
          transform: rotate(-3deg);
  background-color: #cca58b;
}
.reindeer__face:before {
  content: "";
  position: absolute;
  background-color: #cca58b;
  width: 29px;
  height: 16px;
  border-radius: 50%;
  top: 0px;
  left: 11px;
  -webkit-transform: rotate(-49deg);
          transform: rotate(-49deg);
}
.reindeer__face:after {
  content: "";
  position: absolute;
  background-color: #000;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  top: -8px;
  left: 31px;
}
.reindeer__horn {
  position: absolute;
  width: 29px;
  height: 4px;
  top: -7px;
  left: -21px;
  border-radius: 2px;
  -webkit-transform: rotate(38deg);
          transform: rotate(38deg);
  background-color: #f0dbc2;
}
.reindeer__horn:before, .reindeer__horn:after {
  content: "";
  position: absolute;
  background-color: #f0dbc2;
  border-radius: 2px;
}
.reindeer__horn--left {
  top: -7px;
  left: -21px;
}
.reindeer__horn--left:before {
  top: -4px;
  left: 6px;
  width: 14px;
  height: 4px;
  -webkit-transform: rotate(43deg);
          transform: rotate(43deg);
}
.reindeer__horn--left:after {
  top: -4px;
  left: 13px;
  width: 14px;
  height: 4px;
  -webkit-transform: rotate(43deg);
  transform: rotate(53deg);
}
.reindeer__horn--right {
  top: -12px;
  left: -6px;
  width: 24px;
  -webkit-transform: rotate(62deg);
          transform: rotate(62deg);
}
.reindeer__horn--right:before {
  top: -3px;
  left: 5px;
  width: 10px;
  height: 4px;
  -webkit-transform: rotate(43deg);
          transform: rotate(43deg);
}
.reindeer__horn--right:after {
  top: -3px;
  left: 11px;
  width: 10px;
  height: 4px;
  -webkit-transform: rotate(53deg);
          transform: rotate(53deg);
}
.reindeer__ear {
  position: absolute;
  width: 21px;
  height: 11px;
  top: 4px;
  left: -18px;
  border-radius: 4px 0 50% 50%;
  -webkit-transform: rotate(4deg);
          transform: rotate(4deg);
  background-color: #cca58b;
}
.reindeer__ear:before {
  content: "";
  position: absolute;
  top: -2px;
  left: 34px;
  width: 4px;
  height: 5px;
  border-radius: 50%;
  -webkit-transform: rotate(-35deg);
          transform: rotate(-35deg);
  background-color: #000;
}
.reindeer__body {
  position: absolute;
  width: 58px;
  height: 31px;
  top: 84px;
  left: 28px;
  border-radius: 50% 0;
  -webkit-transform: rotate(-3deg);
          transform: rotate(-3deg);
  background-color: #cca58b;
}
.reindeer__body:before {
  content: "";
  position: absolute;
  width: 46px;
  height: 26px;
  top: -15px;
  left: 32px;
  border-radius: 0 0 50% 50%;
  -webkit-transform: rotate(-3deg);
  transform: rotate(-55deg);
  background-color: #cca58b;
}
.reindeer__body:after {
  content: "";
  position: absolute;
  width: 43px;
  height: 26px;
  top: -11px;
  left: 29px;
  border-radius: 0 0 50% 50%;
  -webkit-transform: rotate(-3deg);
  transform: rotate(-30deg);
  background-color: #cca58b;
}
.reindeer__foot-inner {
  position: absolute;
}
.reindeer__foot-inner:before, .reindeer__foot-inner:after {
  content: "";
  position: absolute;
}
.reindeer__foot--front .reindeer__foot-inner {
  width: 40px;
  height: 8px;
  top: 13px;
  left: 35px;
  border-radius: 0 50%;
  -webkit-transform: rotate(-17deg);
          transform: rotate(-17deg);
  background-color: #cca58b;
  -webkit-animation: reindeer-front 0.8s linear alternate infinite;
          animation: reindeer-front 0.8s linear alternate infinite;
}
.reindeer__foot--front .reindeer__foot-inner:before {
  width: 28px;
  height: 8px;
  top: 10px;
  left: 17px;
  border-radius: 2px 50%;
  -webkit-transform: rotate(131deg);
          transform: rotate(131deg);
  background-color: #cca58b;
}
.reindeer__foot--front .reindeer__foot-inner:after {
  width: 7px;
  height: 8px;
  top: 17px;
  left: 18px;
  border-radius: 2px;
  background-color: #cca58b;
}
.reindeer__foot--back .reindeer__foot-inner {
  width: 56px;
  height: 9px;
  top: 37px;
  left: -29px;
  border-radius: 0 50%;
  -webkit-transform: rotate(-73deg);
          transform: rotate(-73deg);
  background-color: #cca58b;
  -webkit-animation: reindeer-back 0.8s linear alternate infinite;
          animation: reindeer-back 0.8s linear alternate infinite;
}
.reindeer__foot--back .reindeer__foot-inner:before {
  width: 25px;
  height: 16px;
  top: 4px;
  left: 25px;
  border-radius: 0 50%;
  -webkit-transform: rotate(15deg);
          transform: rotate(15deg);
  background-color: #cca58b;
}
.reindeer__foot--back .reindeer__foot-inner:after {
  width: 8px;
  height: 9px;
  top: -2px;
  left: -2px;
  border-radius: 2px 0 2px 2px;
  -webkit-transform: rotate(14deg);
          transform: rotate(14deg);
  background-color: #cca58b;
}
.reindeer__tail {
  position: absolute;
  width: 27px;
  height: 26px;
  top: 6px;
  left: -8px;
  border-radius: 50% 2px;
  -webkit-transform: rotate(-17deg);
          transform: rotate(-17deg);
  background-color: #cca58b;
}
.reindeer__tail:before {
  content: "";
  position: absolute;
  background-color: #cca58b;
  border-radius: 50%;
  top: -2px;
  left: -3px;
  width: 15px;
  height: 5px;
  -webkit-transform: rotate(25deg);
          transform: rotate(25deg);
}

.input-toggle {
  opacity: 0;
}
.input-toggle:checked + .house-toggle .house__window {
  background-color: #f5ca95;
  transition: 0.5s;
}
.input-toggle:checked + .house-toggle .house__window .tree,
.input-toggle:checked + .house-toggle .house__window .cat,
.input-toggle:checked + .house-toggle .house__window .present {
  opacity: 1;
  transition: 0.5s;
}

.hukidashi {
  position: absolute;
  width: 69px;
  height: 45px;
  border-radius: 50%;
  opacity: 0.8;
  background-color: #fff;
}
.hukidashi:before, .hukidashi:after {
  content: "";
  position: absolute;
  opacity: 0.8;
}
.hukidashi--speak:before {
  border-left: 9px solid #fff;
  border-top: 5px solid transparent;
  border-bottom: 4px solid transparent;
  right: 3px;
  bottom: 0;
  -webkit-transform: rotate(41deg);
          transform: rotate(41deg);
  opacity: 1;
}
.hukidashi--think:before {
  background-color: #fff;
  width: 10px;
  height: 8px;
  border-radius: 50%;
  right: 33px;
  bottom: -9px;
}
.hukidashi--think:after {
  background-color: #fff;
  width: 8px;
  height: 6px;
  border-radius: 50%;
  right: 20px;
  bottom: -14px;
}
.hukidashi p {
  margin: 13px 0;
  font-size: 15px;
  text-align: center;
}

.sweat {
  position: absolute;
  top: 10px;
  right: 27px;
  width: 10px;
  height: 6px;
  border-radius: 50%;
  background-color: #fff;
  -webkit-transform: rotate(-16deg);
          transform: rotate(-16deg);
}
.sweat:before {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  border-right: 6px solid #fff;
  border-top: 2px solid transparent;
  border-bottom: 2px solid transparent;
  top: 1px;
  left: -5px;
}

@-webkit-keyframes decoration {
  0% {
    opacity: 0.5;
    -webkit-transform: translate3d(-2px, -3px, 0) scale(1);
            transform: translate3d(-2px, -3px, 0) scale(1);
  }
  40% {
    opacity: 0.6;
    -webkit-transform: translate3d(-2px, -3px, 0) scale(1.5);
            transform: translate3d(-2px, -3px, 0) scale(1.5);
  }
  66% {
    opacity: 0.4;
    -webkit-transform: translate3d(-2px, -3px, 0) scale(1.4);
            transform: translate3d(-2px, -3px, 0) scale(1.4);
  }
  100% {
    opacity: 0.5;
    -webkit-transform: translate3d(-2px, -3px, 0) scale(1);
            transform: translate3d(-2px, -3px, 0) scale(1);
  }
}

@keyframes decoration {
  0% {
    opacity: 0.5;
    -webkit-transform: translate3d(-2px, -3px, 0) scale(1);
            transform: translate3d(-2px, -3px, 0) scale(1);
  }
  40% {
    opacity: 0.6;
    -webkit-transform: translate3d(-2px, -3px, 0) scale(1.5);
            transform: translate3d(-2px, -3px, 0) scale(1.5);
  }
  66% {
    opacity: 0.4;
    -webkit-transform: translate3d(-2px, -3px, 0) scale(1.4);
            transform: translate3d(-2px, -3px, 0) scale(1.4);
  }
  100% {
    opacity: 0.5;
    -webkit-transform: translate3d(-2px, -3px, 0) scale(1);
            transform: translate3d(-2px, -3px, 0) scale(1);
  }
}
@-webkit-keyframes santa-chimney {
  0% {
    top: 60px;
  }
  10% {
    top: 10px;
  }
  13% {
    top: 15px;
  }
  45% {
    top: 15px;
  }
  48% {
    top: 10px;
  }
  60% {
    top: 60px;
  }
  100% {
    top: 60px;
  }
}
@keyframes santa-chimney {
  0% {
    top: 60px;
  }
  10% {
    top: 10px;
  }
  13% {
    top: 15px;
  }
  45% {
    top: 15px;
  }
  48% {
    top: 10px;
  }
  60% {
    top: 60px;
  }
  100% {
    top: 60px;
  }
}
@-webkit-keyframes reindeer-front {
  0% {
    -webkit-transform: rotate(-24deg);
            transform: rotate(-24deg);
  }
  100% {
    -webkit-transform: rotate(-13deg);
            transform: rotate(-13deg);
  }
}
@keyframes reindeer-front {
  0% {
    -webkit-transform: rotate(-24deg);
            transform: rotate(-24deg);
  }
  100% {
    -webkit-transform: rotate(-13deg);
            transform: rotate(-13deg);
  }
}
@-webkit-keyframes sori-santa-hand-left {
  0% {
    -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
  }
  100% {
    -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
  }
}
@keyframes sori-santa-hand-left {
  0% {
    -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
  }
  100% {
    -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
  }
}
@-webkit-keyframes sori-santa-lead-left {
  0% {
    -webkit-transform: rotate(1deg);
            transform: rotate(1deg);
  }
  100% {
    -webkit-transform: rotate(-2deg);
            transform: rotate(-2deg);
  }
}
@keyframes sori-santa-lead-left {
  0% {
    -webkit-transform: rotate(1deg);
            transform: rotate(1deg);
  }
  100% {
    -webkit-transform: rotate(-2deg);
            transform: rotate(-2deg);
  }
}
@-webkit-keyframes sori-santa-hand-right {
  0% {
    -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
  }
  100% {
    -webkit-transform: rotate(-2deg);
            transform: rotate(-2deg);
  }
}
@keyframes sori-santa-hand-right {
  0% {
    -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
  }
  100% {
    -webkit-transform: rotate(-2deg);
            transform: rotate(-2deg);
  }
}
@-webkit-keyframes sori-santa-lead-right {
  0% {
    -webkit-transform: rotate(2deg);
            transform: rotate(2deg);
  }
  100% {
    -webkit-transform: rotate(-4deg);
            transform: rotate(-4deg);
  }
}
@keyframes sori-santa-lead-right {
  0% {
    -webkit-transform: rotate(2deg);
            transform: rotate(2deg);
  }
  100% {
    -webkit-transform: rotate(-4deg);
            transform: rotate(-4deg);
  }
}
@-webkit-keyframes sori-santa {
  0% {
    top: -10px;
    left: -500%;
  }
  100% {
    top: -20px;
    left: 500%;
  }
}
@keyframes sori-santa {
  0% {
    top: -10px;
    left: -500%;
  }
  100% {
    top: -20px;
    left: 500%;
  }
}
@-webkit-keyframes santa-foot-left {
  0% {
    -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
  }
  100% {
    -webkit-transform: rotate(-10deg);
            transform: rotate(-10deg);
  }
}
@keyframes santa-foot-left {
  0% {
    -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
  }
  100% {
    -webkit-transform: rotate(-10deg);
            transform: rotate(-10deg);
  }
}
@-webkit-keyframes santa-foot-right {
  0% {
    -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
  }
  100% {
    -webkit-transform: rotate(10deg);
            transform: rotate(10deg);
  }
}
@keyframes santa-foot-right {
  0% {
    -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
  }
  100% {
    -webkit-transform: rotate(10deg);
            transform: rotate(10deg);
  }
}
@-webkit-keyframes santa-walk {
  0% {
    left: 100%;
    -webkit-transform: rotateY(0);
            transform: rotateY(0);
  }
  35% {
    left: 30%;
    -webkit-transform: rotateY(0);
            transform: rotateY(0);
  }
  36% {
    -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
  }
  50% {
    left: 57%;
    -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
  }
  51% {
    -webkit-transform: rotateY(0);
            transform: rotateY(0);
  }
  80% {
    left: calc(0% - 125px);
  }
  100% {
    -webkit-transform: rotateY(0);
            transform: rotateY(0);
    left: calc(0% - 125px);
  }
}
@keyframes santa-walk {
  0% {
    left: 100%;
    -webkit-transform: rotateY(0);
            transform: rotateY(0);
  }
  35% {
    left: 30%;
    -webkit-transform: rotateY(0);
            transform: rotateY(0);
  }
  36% {
    -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
  }
  50% {
    left: 57%;
    -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
  }
  51% {
    -webkit-transform: rotateY(0);
            transform: rotateY(0);
  }
  80% {
    left: calc(0% - 125px);
  }
  100% {
    -webkit-transform: rotateY(0);
            transform: rotateY(0);
    left: calc(0% - 125px);
  }
}
@-webkit-keyframes santa-walk-hukidashi {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0;
  }
  55% {
    opacity: 1;
  }
  60% {
    opacity: 1;
  }
  65% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}
@keyframes santa-walk-hukidashi {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0;
  }
  55% {
    opacity: 1;
  }
  60% {
    opacity: 1;
  }
  65% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}
@-webkit-keyframes sweat {
  0% {
    opacity: 0;
    top: 18px;
    right: 30px;
    -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
  }
  40% {
    opacity: 1;
    top: 10px;
    right: 20px;
  }
  60% {
    opacity: 0;
    top: 10px;
    right: 20px;
  }
  100% {
    opacity: 0;
  }
}
@keyframes sweat {
  0% {
    opacity: 0;
    top: 18px;
    right: 30px;
    -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
  }
  40% {
    opacity: 1;
    top: 10px;
    right: 20px;
  }
  60% {
    opacity: 0;
    top: 10px;
    right: 20px;
  }
  100% {
    opacity: 0;
  }
}
@-webkit-keyframes sweat2 {
  0% {
    opacity: 0;
    top: 10px;
    right: 38px;
    -webkit-transform: rotate(-47deg);
            transform: rotate(-47deg);
  }
  40% {
    opacity: 1;
    top: 2px;
    right: 31px;
  }
  60% {
    opacity: 0;
    top: 2px;
    right: 31px;
  }
  100% {
    opacity: 0;
  }
}
@keyframes sweat2 {
  0% {
    opacity: 0;
    top: 10px;
    right: 38px;
    -webkit-transform: rotate(-47deg);
            transform: rotate(-47deg);
  }
  40% {
    opacity: 1;
    top: 2px;
    right: 31px;
  }
  60% {
    opacity: 0;
    top: 2px;
    right: 31px;
  }
  100% {
    opacity: 0;
  }
}
@-webkit-keyframes santa-hand-left {
  0% {
    -webkit-transform: rotate(14deg);
            transform: rotate(14deg);
  }
  100% {
    -webkit-transform: rotate(8deg);
            transform: rotate(8deg);
  }
}
@keyframes santa-hand-left {
  0% {
    -webkit-transform: rotate(14deg);
            transform: rotate(14deg);
  }
  100% {
    -webkit-transform: rotate(8deg);
            transform: rotate(8deg);
  }
}




.marquee{
    display: block;
    position: absolute;
    bottom: 0;
    width: 100%;
    left: 0;
    height: 18px;
    animation: scroll 20s linear infinite;
    padding: 3px;
    margin: 8px auto;
}

.marquee:hover {
    animation-play-state: paused
}

.img1 {
    max-width: 900px;
    width: 80%;
    height:80px;
    background-color: rgba(255,255,255,.6);
    border-radius: 12px;
    margin: 18px auto;
    overflow: hidden;
}

.img1 .media-body{ 
  padding: 10px;

}

.img1 .media-heading{ 
  text-align: left;
  height: 38px;
  overflow: hidden;
  display: block;
  word-break: break-all;
}
.img1 .media-footer {
  float :left;
}

/* Make it move 
@keyframes scroll{
0% {top: 700px;}
100% {top:-7000px;}
}
*/
/*
@keyframes scroll {
  0%{
    transform: translate3d(0, 0, 0);
  }
  100%{
    transform: translate3d(0, -1692px, 0);
  }
}*/



.christmas-modal { 
  background: url('images/christmas-modal.jpg') ;
  background-size: cover;
  background-clip: content-box;
}
.christmas-modal .modal-header {
  border-bottom: none;
}
.christmas-modal .modal-body {
  margin: 0 auto;
  max-width: 600px;
}
.christmas-modal .modal-header .close{
  font-size: 40px;
}

.christmas-modal .modal-footer{
  text-align: center;
  border-top: none;
  margin-bottom: 30px;
}

.input-blessing {
  margin-top: 30px;
  resize: none;
  height: 120px !important;
  background: rgba(255,255,255,0.2);
  border-radius: 10px;
  border: none;
  font-size: 20px;
  color: white;
  font-weight: bold;
}

.title-animate {
  font-size: 60px;
  text-align: center;
}

.title-animate span { display:inline-block; animation:float .2s ease-in-out infinite; }


 @keyframes float {
  0%,100%{ transform:none; }
  33%{ transform:translateY(-1px) rotate(-2deg); }
  66%{ transform:translateY(1px) rotate(2deg); }
}
.modal-body:hover span { animation:bounce .6s; }
@keyframes bounce {
  0%,100%{ transform:translate(0); }
  25%{ transform:rotateX(20deg) translateY(2px) rotate(-3deg); }
  50%{ transform:translateY(-20px) rotate(3deg) scale(1.1);  }
}

.title-animate span{ 
  color: #ffc006; 
  text-shadow:1px 1px #9a7300, 2px 2px #9a7300, 3px 3px #9a7300, 4px 4px #9a7300; 
} 

.title-animate span:nth-child(2){ animation-delay:.05s; }
.title-animate span:nth-child(3){ animation-delay:.1s; }
.title-animate span:nth-child(4){ animation-delay:.15s; }
.title-animate span:nth-child(5){ animation-delay:.2s; }
.title-animate span:nth-child(6){ animation-delay:.25s; }
.title-animate span:nth-child(7){ animation-delay:.3s; }
.title-animate span:nth-child(8){ animation-delay:.35s; }
.title-animate span:nth-child(9){ animation-delay:.4s; }
.title-animate span:nth-child(10){ animation-delay:.45s; }
.title-animate span:nth-child(11){ animation-delay:.5s; }
.title-animate span:nth-child(12){ animation-delay:.55s; }
.title-animate span:nth-child(13){ animation-delay:.6s; }
.title-animate span:nth-child(14){ animation-delay:.65s; }


.btn-blessing {
  background: #ffc20e;
  color: white;
  font-size: 20px;
}

.media-object {
  height: 80px;
  padding-left: 10px;
}

.cardHNY{
  margin-left: -400px;
  margin-top: -350px;
}

</style>

<header class="intro-header">
    <div class="header-slider" style="height: 600px; width: 100%; background: url('images/christmas.png'); 
    background-repeat : no-repeat; background-position: center center; background-size: cover; z-index: 9999;"> 
        <div class="text-box">
          <div class="status-code">
            <p style="opacity:0;">4</p>
            <div class="zero">
              <div class="sori-santa">
                <div class="santa santa--sori">
                  <div class="santa__hat">
                    <div class="santa__hat-part"></div>
                    <div class="santa__hat-part"></div>
                  </div>
                  <div class="santa__face">
                    <div class="santa__eyebrows santa__eyebrows--right"></div>
                    <div class="santa__eyebrows santa__eyebrows--left"></div>
                    <div class="santa__eye santa__eye--right"></div>
                    <div class="santa__eye santa__eye--left"></div>
                    <div class="santa__nose"></div>
                    <div class="santa__cheek santa__cheek--right"></div>
                    <div class="santa__cheek santa__cheek--left"></div>
                    <div class="santa__beard">
                      <div class="santa__beard-part"></div>
                      <div class="santa__beard-part"></div>
                      <div class="santa__beard-part"></div>
                    </div>
                    <div class="santa__mouth"></div>
                  </div>
                  <div class="santa__body">
                    <div class="santa__body-top"></div>
                    <div class="santa__hand santa__hand--left">
                      <div class="santa__hand-inner"></div>
                    </div>
                    <div class="santa__hand santa__hand--right"></div>
                    <div class="santa__body-bottom">
                      <div class="santa__foot santa__foot--left">
                        <div class="santa__foot-inner"></div>
                      </div>
                      <div class="santa__foot santa__foot--right">
                        <div class="santa__foot-inner"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="lead">
                  <div class="lead-inner"></div>
                </div>
                <div class="lead lead--back">
                  <div class="lead-inner"></div>
                </div>
                <div class="sori"></div>
                <div class="reindeer">
                  <div class="reindeer__face">
                    <div class="reindeer__ear"></div>
                    <div class="reindeer__horn reindeer__horn--right"></div>
                    <div class="reindeer__horn reindeer__horn--left"></div>
                  </div>
                  <div class="reindeer__body">
                    <div class="reindeer__foot reindeer__foot--front">
                      <div class="reindeer__foot-inner"></div>
                    </div>
                    <div class="reindeer__foot reindeer__foot--back">
                      <div class="reindeer__foot-inner"></div>
                    </div>
                    <div class="reindeer__tail"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text">
          </div>
        </div>
        <div class="house house--first-floor">
          <div class="santa santa--chimney">
            <div class="santa__hat">
              <div class="santa__hat-part"></div>
              <div class="santa__hat-part"></div>
            </div>
            <div class="santa__face">
              <div class="santa__eyebrows santa__eyebrows--right"></div>
              <div class="santa__eyebrows santa__eyebrows--left"></div>
              <div class="santa__eye santa__eye--right"></div>
              <div class="santa__eye santa__eye--left"></div>
              <div class="santa__nose"></div>
              <div class="santa__cheek santa__cheek--right"></div>
              <div class="santa__cheek santa__cheek--left"></div>
              <div class="santa__beard">
                <div class="santa__beard-part"></div>
                <div class="santa__beard-part"></div>
                <div class="santa__beard-part"></div>
              </div>
              <div class="santa__mouth"></div>
            </div>
            <div class="santa__body">
              <div class="santa__body-top"></div>
              <div class="santa__hand santa__hand--left">
                <div class="santa__hand-inner"></div>
              </div>
              <div class="santa__hand santa__hand--right"></div>
              <div class="santa__body-bottom">
                <div class="santa__foot santa__foot--left">
                  <div class="santa__foot-inner"></div>
                </div>
                <div class="santa__foot santa__foot--right">
                  <div class="santa__foot-inner"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="lease">
            <div class="lease__ribbon"></div>
            <div class="lease__decoration">
              <div class="lease__decoration-part"></div>
              <div class="lease__decoration-part"></div>
              <div class="lease__decoration-part"></div>
            </div>
          </div>
          <div class="house__chimney">
            <div class="snow"></div>
          </div>
          <div class="house__bottom">
            <div class="house__roof house__roof--triangle">
              <div class="snow"></div>
            </div>
            <input class="input-toggle" id="toggle" type="checkbox">
            <label class="house-toggle" for="toggle"><span class="house__window"><span class="cat"><span class="cat__face"></span><span class="cat__body"></span></span><span class="present"><span class="present__ribbon"></span></span></span></label>
            <div class="house__door"></div>
          </div>
        </div>
        <div class="house house--second-floor">
          <div class="snowman">
            {{-- <div class="hukidashi hukidashi--speak">
              <p>ร่วมส่งความสุขและความปรารถนาดีให้แก่กัน</p>
            </div> --}}
            <div class="snowman__body">
              <div class="snowman__hat"></div>
              <div class="snowman__face"></div>
              <div class="snowman__hand snowman__hand--right"></div>
              <div class="snowman__hand snowman__hand--left"></div>
              <div class="snowman__scarf"></div>
            </div>
          </div>
          <div class="house__chimney">
            <div class="snow"></div>
          </div>
          <div class="house__bottom">
            <div class="house__roof house__roof--trapezoid">
              <div class="snow"></div>
            </div>
            <input class="input-toggle" id="toggle2" type="checkbox">
            <label class="house-toggle" for="toggle2"><span class="house__window"><span class="tree"><span class="tree__body"></span><span class="tree__decorations"><span class="tree__decoration"></span><span class="tree__decoration"></span><span class="tree__decoration"></span><span class="tree__decoration"></span><span class="tree__decoration"></span><span class="tree__decoration"></span></span></span></span></label>
            <div class="house__door"></div>
          </div>
          <div class="house__top">
            <div class="house__roof house__roof--triangle">
              <div class="snow"></div>
            </div>
            <input class="input-toggle" id="toggle3" type="checkbox">
            <label class="house-toggle" for="toggle3"><span class="house__window"></span></label>
          </div>
        </div>
        <div class="santa santa--walk">
          
          <div class="sweat"></div>
          <div class="sweat"></div>
          <div class="santa__hat">
            <div class="santa__hat-part"></div>
            <div class="santa__hat-part"></div>
          </div>
          <div class="santa__face">
            <div class="santa__eyebrows santa__eyebrows--right"></div>
            <div class="santa__eyebrows santa__eyebrows--left"></div>
            <div class="santa__eye santa__eye--right"></div>
            <div class="santa__eye santa__eye--left"></div>
            <div class="santa__nose"></div>
            <div class="santa__cheek santa__cheek--right"></div>
            <div class="santa__cheek santa__cheek--left"></div>
            <div class="santa__beard">
              <div class="santa__beard-part"></div>
              <div class="santa__beard-part"></div>
              <div class="santa__beard-part"></div>
            </div>
            <div class="santa__mouth"></div>
          </div>
          <div class="santa__body">
            <div class="santa__body-top"></div>
            <div class="santa__hand santa__hand--left">
              <div class="santa__hand-inner"></div>
            </div>
            <div class="santa__hand santa__hand--right"></div>
            <div class="santa__body-bottom">
              <div class="santa__foot santa__foot--left">
                <div class="santa__foot-inner"></div>
              </div>
              <div class="santa__foot santa__foot--right">
                <div class="santa__foot-inner"></div>
              </div>
            </div>
          </div>
        </div>
        

        <div class="container">

          <div class="marquee" style="height: 100%;" id="card-list">
            {{-- <div class="img1">
              <div class="media">
                <div class="media-left">
                    <img class="media-object" src="https://semantic-ui.com/images/avatar2/large/kristy.png" alt="..." style="width: 100px;" />
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id porttitor augue. Vestibulum in dolor tortor. Aenean feugiat velit sit amet auctor scelerisque. Proin non porttitor magna. Suspendisse ut vulputate dolor. Curabitur porta orci at justo feugiat, at venenatis elit ullamcorper. Curabitur molestie, lectus vitae lacinia facilisis, tortor ligula accumsan sapien, eu scelerisque risus dui eget risus. Morbi at 
                    </h4>
                    <i class="media-footer">โดย คุณ </i>
                </div>
              </div>
            </div>   --}}
          </div>
        </div>
        
        {{-- <div class="container cardHNY" >
          <button class="btn btn-card" data-toggle="modal" data-target="#cardModal" >
            ส.ค.ส จาก คุณธวิช จารุวจนะ
          </button>
        <div> --}}
    </div>

    
</header>
<div style="position: relative; background: url('images/bg-modal.png');  ">
    <div class="container">
        <div class="row text-center">
            <div style="background: rgba(0,0,0, 0.3); border-radius: 12px; padding:20px; margin: 30px; ">
                <h1 style="font-size: 50px; color: #ffc006;" >ร่วมส่งความสุขและความปรารถนาดีให้แก่กัน</h1>
                <button class="btn btn-blessing" data-toggle="modal" data-target="#blessingModal" >
                    ร่วมอวยพรเลย
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="blessingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content christmas-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form id="blessingForm">
        
        <div class="modal-body">
          {{-- <h1 class="modal-title" id="myModalLabel">
            ร่วมส่งความสุขและความปรารถนาดีให้แก่กัน
          </h1> --}}
          <h1  class="modal-title title-animate">
            <span>ร่วม</span><span>ส่ง</span><span>ความ</span><span>สุข</span><span>และ</span><span>ความ</span><span>ปรารถนา</span><span>ดี</span><span>ให้</span><span>แก่</span><span>กัน</span>
            
          </h1>
          <div class="form-group">
            <textarea name="" id="blessing_input"  class="form-control input-blessing" required name="blessing" maxlength="150"></textarea>
            <span style="color: white;">max length 150 characters only!</span>
          </div>
        </div>
        <h3 style="text-align: center; color: red;" id="warning"></h3>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-blessing">อวยพรเลย</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>   
<script>

  //var URL = 'https://mis_test.metrosystems.co.th';
  var socket = io.connect(':44301', {secure: true});

  socket.on('cards', function(word){
    console.log(word)
    // $('#card-list').append();

    allBless = 
        '<div class="img1"> ' +
        '  <div class="media"> ' + 
        '    <div class="media-left"> ' +
        '        <img class="media-object" src="./images/santa/santa-' +  (Math.floor(Math.random() * 6) + 1)  + '.png" alt="..."  /> ' +
        '    </div> ' +
        '    <div class="media-body"> ' +
        '        <h4 class="media-heading"> ' +
        '            ' + word.word + 
        '        </h4> ' +
        '        <i class="media-footer"> ' +
        '            โดยคุณ : ' + word.display_name + 
        '        </i>' +
        '    </div>' +
        '  </div>' +
        '</div>  ' + allBless;

    $('.marquee').empty();
    $('.marquee').append(allBless);
    
    $('.marquee')
      .marquee(mq_attr);

  });


var mq_attr = {
      duration: 11000,
      gap: 50,
      delayBeforeStart: 0,
      direction: 'up',
      duplicated: true,
  }
//if you have images in marquee
$(window).load(function() {
  // $('.marquee').marquee(mq_attr);

});

  $("#blessingForm").submit(function (e) {
    event.preventDefault();
    var text = $('#blessing_input').val();
    var data =  {
      word: text
    }

    $.ajax({
        url: "/newportal/chrismashny/word/add", 
        method: "POST",
        data: data
    }).done(function (res) {
      if (!res.block) {
        $('#blessingModal').modal('toggle');
        $('#blessing_input').val(''); 
      }else { 
        $('#warning').html  (res.error);
      }
    });
  });


  $( document ).ready(function() {
    getBlessing();
  });

  $('#blessingModal').on('hidden.bs.modal', function () {
    $('#warning').html('');
})

  var allBless = '';
  function getBlessing() {
    $.ajax({
        url: "/newportal/chrismashny/showall/100", 
        method: "GET"
    }).done(function (res) {
      
      allBless = '';
      for (var i = 0 ; i < res.words.length ; i++ ) {
        allBless += 
        '<div class="img1 "> ' + 
        '  <div class="media"> ' + 
        '    <div class="media-left">  ' + 
        '        <img class="media-object" src="./images/santa/santa-' +  ( Math.floor(Math.random() * 6) + 1 )  + '.png" alt="..." /> ' + 
        '    </div> ' + 
        '    <div class="media-body">  ' + 
        '        <h4 class="media-heading"> ' + 
        '            ' + res.words[i].word + 
        '        </h4>  ' + 
        '        <i class="media-footer">  ' + 
        '            โดยคุณ : ' + res.words[i].display_name + 
        '        </i> ' + 
        '    </div> ' + 
        '  </div> ' + 
        '</div>   '  
        ;
      }
      $('.marquee').empty();
      $('.marquee').append(allBless);
      $('.marquee').marquee(mq_attr);
    });
  }


</script>
