<template>
    <div>
        <div class="buttons  mt-8">
            <input type="text" v-model="skill_item" class="form-control input-default w-100"
                   @keypress.enter.prevent="addSkillItem" placeholder="Введите ваши навыки ">
            <button @click.prevent="addSkillItem()" class="btn-small btn-default">
                Добавить
            </button>
        </div>

        <div class="skill-items" v-if="skills.length">

            <div class="form-custom" v-for="(skill_item, index) in skills">
                <label class="skill-item m-0" :for="index">
                    {{ skill_item }}
                    <svg @click.prevent="deleteSkillItem(index)" width="11" height="11" viewBox="0 0 11 11" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.02924 1.02851C1.2896 0.768165 1.7117 0.768165 1.97206 1.02851L5.50065 4.55712L9.02925 1.02851C9.28959 0.768165 9.71172 0.768165 9.97205 1.02851C10.2324 1.28887 10.2324 1.71097 9.97205 1.97133L6.44345 5.49992L9.97205 9.02852C10.2324 9.28885 10.2324 9.71099 9.97205 9.97132C9.71172 10.2317 9.28959 10.2317 9.02925 9.97132L5.50065 6.44272L1.97206 9.97132C1.7117 10.2317 1.2896 10.2317 1.02924 9.97132C0.768898 9.71099 0.768898 9.28885 1.02924 9.02852L4.55785 5.49992L1.02924 1.97133C0.768898 1.71097 0.768898 1.28887 1.02924 1.02851Z"
                            fill="#333333"/>
                    </svg>
                </label>
                <input type="text" hidden :id="index" name="skills[]" :value="skill_item">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'skills_items'
    ],
    data() {
        return {
            skill_item: '',
            skills: []
        }
    },
    methods: {
        deleteSkillItem(index) {
            this.skills = this.skills.filter((item, item_index) => index != item_index)
        },
        addSkillItem() {
            if (this.skill_item.length) {
                this.skills.push(this.skill_item)
                this.skill_item = '';
            }

        },
    },
    created() {
        this.skills = this.skills_items
    }
}
</script>
