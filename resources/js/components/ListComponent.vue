<template>
    <section class="p-step">
        <ul class="p-step__card-group">
            <li class="p-step__card" v-for="step in steps.data" :key="step.id">
                <a class="p-step__link" :href="step.id">
                    <h2 class="p-step__title">
                        {{ step.title }}
                    </h2>
                    <div class="p-step__info-container">
                        <p class="p-step__info">
                            投稿時間：{{ step.created_at }}
                        </p>
                        <p class="p-step__info">
                            カテゴリー：{{ step.category.name }}
                        </p>
                        <p class="p-step__info">
                            目安達成時間：{{ step.all_clear_time }}時間
                        </p>
                        <p class="p-step__info">
                            総合チャレンジ回数：{{ step.challenger_count }}回
                        </p>
                    </div>
                </a>
            </li>
        </ul>
    </section>
</template>

<script>
export default {
    props: ["steps"]
};
</script>
