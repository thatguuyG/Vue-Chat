<template>
  <div class="row chat-app">
    <div class="col-sm-3 contacts-part">
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
    </div>
    <div class="col-sm-8">
        <Conversation :contact="selectedContact" :messages="messages"  @new="saveNewMessage"/>
    </div>
  </div>


</template>

<script>

    import Conversation from './Conversation';
    import ContactsList from './ContactsList';


    export default {
        props: {
            user:{
                type: Object,
                required: true
            }
        },
        data(){
            return{
                selectedContact: null,
                messages: [],
                contacts: []
            };
        },
        mounted() {
            Echo.private(`messages.${this.user.id}`)
            .listen('NewMessage', (e) => {
                this.handleIncoming(e.message);
            });

            // console.log(this.user);
            axios.get('/contacts')
            .then((response) => {
                // console.log(response.data);
                this.contacts = response.data;
            });
        },

        methods:{
            startConversationWith(contact){
                axios.get(`/conversation/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                });
            },
            saveNewMessage(text) {
                this.messages.push(text);
            },
            handleIncoming(message){
                if (this.selectedContact && message.from == this.selectedContact.id) {
                    this.saveNewMessage(message);
                    return;
                }

                alert(message.text);
            }
        },

        components : {Conversation, ContactsList}
    }
</script>


<style lang="css" scoped>
/* .chat-app {
     display: flex;
} */
.contacts-part{
    border-right: 1px solid #ccc;
}
</style>
