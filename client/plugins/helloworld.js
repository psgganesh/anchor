import Vue from 'vue'

Vue.prototype.$myInjectedFunction = (string) => console.log("Hello world from -- ", string)