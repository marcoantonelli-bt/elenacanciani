export function randId() {
  return Math.random().toString(36).replace(/[^a-z]+/g, '').substr(2, 10);
}

export function getRequest (url, params = {}) {
  let completeUrl = url

  if (params) {
    if (completeUrl.indexOf('?') < 0) {
      completeUrl = `${completeUrl}?`
    }

    Object.keys(params).map((paramKey) => {
      completeUrl = `${completeUrl}${paramKey}=${params[paramKey]}&`
    })
  }

  return new Promise((resolve, reject) => {
    fetch(completeUrl, { method: "GET" })
    .then(response => response.text())
    .then(response => resolve(response))
    .catch((err) => { resolve('') })
  })
}

export function postRequest (url, params = {}) {
  let completeUrl = url
  let formData = new FormData()

  if (params) {
    Object.keys(params).map((paramKey) => {
      formData.append(paramKey, params[paramKey])
    })
  }

  return new Promise((resolve, reject) => {
    fetch(completeUrl, { method: "POST", body: formData })
    .then(response => response.text())
    .then(response => resolve(response))
    .catch((err) => { resolve('') })
  })
}

export function fadeOut(el, callback = () => {}) {
  el.style.opacity = 1

  const fade = () => {
    if ((el.style.opacity -= .1) < 0) {
      el.style.display = "none"
      callback()
    } else {
      requestAnimationFrame(fade)
    }
  }

  fade()
}

export function fadeIn(el, display, callback = () => {}) {
  el.style.opacity = 0
  el.style.display = display || "block"

  const fade = () => {
    var val = parseFloat(el.style.opacity)
    if (!((val += .1) > 1)) {
      el.style.opacity = val
      requestAnimationFrame(fade)
    } else {
      callback()
    }
  }

  fade()
}

export function disableScroll() {
  document.body.style.overflow = 'hidden'
}

export function enableScroll() {
  document.body.style.overflow = 'auto'
}

export function numberToPrice(number) {
  let finalNumber = number
  const numSplitted = number.toString().split('.')
  if (numSplitted[1] && numSplitted[1].length > 2) {
    finalNumber = Math.ceil(number * 100) / 100
  }
  return finalNumber.toFixed(2).replace('.', ',') + '€'
}

export function getFormParams(form) {
  const inputs = form.querySelectorAll('input')
  const textareas = form.querySelectorAll('textarea')
  const params = {}

  textareas.forEach((i) => {
    params[i.getAttribute('name')] = i.value
  })

  inputs.forEach((i) => {
    if (i.type == 'checkbox') {
      if (i.checked) {
        if (params[i.getAttribute('name')]) {
          params[i.getAttribute('name')] = params[i.getAttribute('name')] + ', ' + i.value
        } else {
          params[i.getAttribute('name')] = i.value
        }
      }
    } else if (i.type == 'radio') {
      if (i.checked) { params[i.getAttribute('name')] = i.value }
    } else {
      params[i.getAttribute('name')] = i.value
    }
  })

  return params
}

export function emptyfyForm(form) {
  const inputs = form.querySelectorAll('input')
  const textareas = form.querySelectorAll('textarea')

  textareas.forEach((i) => {
    i.value = ''
  })

  inputs.forEach((i) => {
    if (i.type == 'checkbox') {
     i.checked = false
    } else if (i.type == 'radio' && i.checked) {
      i.checked = false
    } else {
      i.value = ''
    }
  })

  return true
}

export function debounce(func, wait, immediate) {
  let timeout
  return function() {
    let context = this
    let args = arguments
    let later = function() {
      timeout = null
      if (!immediate) func.apply(context, args)
    }
    let callNow = immediate && !timeout
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
    if (callNow) func.apply(context, args)
  }
}

export function maxW(size) {
  const sizes = {
    'mobile': '580px',
    'tab-down': '767px',
    'desk-tab': '998px',
    'desk-down': '1140px',
    'desk-medium': '1600px',
    'desk-large': '1440px'
  }
  return window.matchMedia(`(max-width: ${sizes[size] || size})`).matches
}

export function validateFiscalCode(value) {
  const re = /^(?:[A-Z][AEIOU][AEIOUX]|[B-DF-HJ-NP-TV-Z]{2}[A-Z]){2}(?:[\dLMNP-V]{2}(?:[A-EHLMPR-T](?:[04LQ][1-9MNP-V]|[15MR][\dLMNP-V]|[26NS][0-8LMNP-U])|[DHPS][37PT][0L]|[ACELMRT][37PT][01LM]|[AC-EHLMPR-T][26NS][9V])|(?:[02468LNQSU][048LQU]|[13579MPRTV][26NS])B[26NS][9V])(?:[A-MZ][1-9MNP-V][\dLMNP-V]{2}|[A-M][0L](?:[1-9MNP-V][\dLMNP-V]|[0L][1-9MNP-V]))[A-Z]$/i
  return re.test(value.toUpperCase())
}

export function updateUrlParams(params) {
  const updateUrlGetParameter = (uri, key, value) => {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
      return uri.replace(re, '$1' + key + "=" + value + '$2');
    }
    else {
      return uri + separator + key + "=" + value;
    }
  }

  let url = window.location.href
  Object.keys(params).forEach((key) => {
    url = updateUrlGetParameter(url, key, params[key])
  })

  window.history.replaceState(null, null, url)
}

export function getUrlParams() {
  var url = window.location.href;
  // get query string from url (optional) or window
  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

  // we'll store the parameters here
  var obj = {};

  // if query string exists
  if (queryString) {

    // stuff after # is not part of query string, so get rid of it
    queryString = queryString.split('#')[0];

    // split our query string into its component parts
    var arr = queryString.split('&');

    for (var i = 0; i < arr.length; i++) {
      // separate the keys and the values
      var a = arr[i].split('=');

      // set parameter name and value (use 'true' if empty)
      var paramName = a[0];
      var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];

      // (optional) keep case consistent
      paramName = paramName.toLowerCase();
      if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();

      // if the paramName ends with square brackets, e.g. colors[] or colors[2]
      if (paramName.match(/\[(\d+)?\]$/)) {

        // create key if it doesn't exist
        var key = paramName.replace(/\[(\d+)?\]/, '');
        if (!obj[key]) obj[key] = [];

        // if it's an indexed array e.g. colors[2]
        if (paramName.match(/\[\d+\]$/)) {
          // get the index value and add the entry at the appropriate position
          var index = /\[(\d+)\]/.exec(paramName)[1];
          obj[key][index] = paramValue;
        } else {
          // otherwise add the value to the end of the array
          obj[key].push(paramValue);
        }
      } else {
        // we're dealing with a string
        if (!obj[paramName]) {
          // if it doesn't exist, create property
          obj[paramName] = paramValue;
        } else if (obj[paramName] && typeof obj[paramName] === 'string'){
          // if property does exist and it's a string, convert it to an array
          obj[paramName] = [obj[paramName]];
          obj[paramName].push(paramValue);
        } else {
          // otherwise add the property
          obj[paramName].push(paramValue);
        }
      }
    }
  }

  return obj;
}

export function validdatePresenceOneOf(obj, keys) {
  let valid = false
  keys.forEach((key) => {
    if (obj[key] && obj[key] !== '') {
      valid = true
    }
  })
  return valid
}
