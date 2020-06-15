<!-- File: src/Template/Articles/add.ctp -->
<?php

$sex_options = $sexs->map(function ($value, $key) {
    if ($key !== 0) {
        return [
            'value' => $value->code,
            'text' => $value->name
        ];
    }

});

?>

<section class="user_register">
    <div class="container">
        <div class="columns is-centered">
            <div class="panel column is-5-tablet is-6-desktop is-6-widescreen is-link">
                <p class="panel-heading">
                    ユーザー作成画面
                </p>
                <?= $this->Form->create($user) ?>

                <div class="field">
                    <?php if ($this->Form->isFieldError('first_name')) : ?>
                        <div class="notification is-danger">
                            <?php echo $this->Form->error('first_name') ?>
                        </div>
                    <?php endif; ?>
                    <label class="label">姓</label>
                    <div class="control">
                        <?= $this->Form->text('first_name', ['type' => 'text', 'required' => false, 'class' => 'input', 'placeholder' => '例）山田']) ?>
                    </div>
                </div>

                <div class="field">
                    <?php if ($this->Form->isFieldError('last_name')) : ?>
                        <div class="notification is-danger">
                            <?php echo $this->Form->error('last_name') ?>
                        </div>
                    <?php endif; ?>
                    <label class="label">名</label>
                    <div class="control">
                        <?= $this->Form->text('last_name', ['type' => 'text', 'required' => false, 'class' => 'input', 'placeholder' => '例）太郎']) ?>
                    </div>
                </div>

                <div class="field">
                    <?php if ($this->Form->isFieldError('sex_code')) : ?>
                        <div class="notification is-danger">
                            <?php echo $this->Form->error('sex_code') ?>
                        </div>
                    <?php endif; ?>
                    <label class="label">性別</label>
                    <div class="control">
                        <div class="select">

                            <?= $this->Form->select('sex_code', $sex_options, [
                                'class' => 'form-control',
                                'default' => 0
                            ]); ?>
                        </div>
                    </div>
                </div>


                <div class="field">

                    <?php if ($this->Form->isFieldError('tell')) : ?>
                        <div class="notification is-danger">
                            <?php echo $this->Form->error('tell') ?>
                        </div>
                    <?php endif; ?>
                    <label class="label">電話番号</label>
                    <div class="control">
                        <?= $this->Form->text('tell', ['type' => 'text', 'required' => false, 'class' => 'input', 'placeholder' => 'ハイフンなしで半角数字で入力してください']) ?>
                    </div>
                </div>

                <div class="field">

                    <?php if ($this->Form->isFieldError('email')) : ?>
                        <div class="notification is-danger">
                            <?php echo $this->Form->error('email') ?>
                        </div>
                    <?php endif; ?>
                    <label class="label">メールアドレス</label>
                    <div class="control">
                        <?= $this->Form->text('email', ['type' => 'text', 'required' => false, 'class' => 'input', 'placeholder' => '例）example@gmail.com']) ?>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <?= $this->Form->button(__('登録'), ['class' => 'button is-link submit']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
