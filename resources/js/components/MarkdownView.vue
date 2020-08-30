<template>
    <div>
        <div v-if="editable">
            <textarea name="content" class="rawtext" v-model="rawtext" @input="typing">
            </textarea>
        </div>
        <div v-html="preview"></div>
    </div>
</template>

<style>
    .rawtext {
        width: 800px;
        height: 200px;
    }
</style>

<script>
    import marked from "marked";
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            mdtext: String,
            editable: Boolean
        },
        data() {
            return {
                rawtext: this.mdtext
            }
        },
        methods: {
            typing: function(el) {
              this.rawtext = el.target.value;
            },
        },
        computed: {
            preview: function() {
                return marked(this.rawtext, { sanitize: true })
            }
        }
    }
</script>
