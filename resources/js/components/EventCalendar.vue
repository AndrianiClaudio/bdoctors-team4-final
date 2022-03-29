<script lang='ts'>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar, { CalendarOptions, EventApi, DateSelectArg, EventClickArg } from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
    name: 'EventCalendar',
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
      calendarOptions: {
        plugins: [ dayGridPlugin, interactionPlugin ],
        initialView: 'dayGridMonth'
      },
      
    }
  },
  methods: {
    handleDateSelect(selectInfo: DateSelectArg) {
      let title = prompt('Please enter a new title for your event')
      let calendarApi = selectInfo.view.calendar
    }
  }
}
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>