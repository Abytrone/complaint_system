import './bootstrap';
import Swal from 'sweetalert2'
window.Swal = Swal
import './custom'

import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

Alpine.plugin(focus)

window.Alpine = Alpine

Alpine.start()
