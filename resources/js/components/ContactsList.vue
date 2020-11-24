<template>
    <div class="contacts-list">
        <!-- <ul>
            <li v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{ 'selected': index == selected }">
                <div class="avatar">
                    <img :src="contact.profile_image" :alt="contact.name">
                </div>

                <div class="contact">
                    <p class="name">{{ contact.name }}</p>
                    <p class="email">{{ contact.email }}</p>
                </div>
            </li>
        </ul> -->
        <ul class="contact-list overflow-auto">
         <div class="container">
             <div class="row">
                 <div class="col-sm-9 mr-3 mainsearch">
                       <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control search-field" placeholder="Search">
                       </div>
                 </div>
                 <div class="col-sm-2 mr-1">

                   <svg class="filtersvg cursorpointer" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 21H5V19H2V17H5V15H7V21ZM22 19H9V17H22V19ZM17 15H15V13H2V11H15V9.012H17V15ZM22
                         13H19V11H22V13ZM11 9H9V7H2V5H9V3H11V9ZM22 7H13V5H22V7Z" fill="#2E3A59"/>
                   </svg>


                 </div>
             </div>
         </div>
         <hr class="customhr">
            <li v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{ 'selected': index == selected }">
                <div class="card cursorpointer center-card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img :src="contact.profile_image" :alt="contact.name" width="39" height="39" class="round-this">
                                </div>
                                <div class="col-sm">
                                    <div class="row">
                                        {{ contact.name }}
                                    </div>
                                     <div class="row">
                                        Message template here...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props:{
        contacts: {
            type: Array,
            default: []
    }
    },
    data() {
        return{
            selected:0
        }
    },
    methods:{
        selectContact(index, contact){
            this.selected = index;
            this.$emit('selected', contact);
        }
    }
}
</script>

<style lang="css" scoped>
.contact-list{
    list-style-type: none;
    max-height:810px;
}
.round-this{
    border-radius: 30px;
}
.cursorpointer{
    cursor: pointer;
}

.center-card{
    margin-right: 70px;
    width: 18rem;
}

.filtersvg{
    border:none;
    position: relative;
    right: 30px;
    top: 5px;
}


.search-field{
    background-color: #ebecec;
}

.mainsearch{
   position: relative;
   right: 11px;
}

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}

.customhr{
    height: 12px;
}

/* .contacts-list {
    flex: 2;
    max-height: 100%;
    height: 600px;
    overflow: scroll;
    border-left: 1px solid #a6a6a6;

    ul {
        list-style-type: none;
        padding-left: 0;
        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #aaaaaa;
            height: 80px;
            position: relative;
            cursor: pointer;
            &.selected {
                background: #dfdfdf;
            }
            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }
            .avatar {
                flex: 1;
                display: flex;
                align-items: center;
                img {
                    width: 35px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }
            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;
                p {
                    margin: 0;
                    &.name {
                        font-weight: bold;
                    }
                }
            }
        }
    }
} */
</style>
