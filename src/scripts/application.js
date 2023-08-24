import "@stimulus/polyfills"
import { Application } from 'stimulus'
import NavController from './controllers/NavController'

// Initialize stimulus.
const application = Application.start()
application.register('nav', NavController)

// Manage load completed event.
window.addEventListener('DOMContentLoaded', () => {
  document.body.classList.add('js')
})
