<!-- File: src/Template/Articles/add.ctp -->

<section class="user_register">
    <div class="container">
        <div class="columns is-centered">
            <div class="panel column is-5-tablet is-6-desktop is-6-widescreen is-danger">
                <p class="panel-heading">
                    ユーザー削除画面
                </p>
                <p class="mt-5 mb-5">削除される場合は、下記の「削除するボタン」をクリックしてください。</p>
                <?= $this->Form->create($user, ['type' => 'delete']) ?>

                <div class="field">

                    <label class="label">姓</label>
                    <div class="control">
                        <p><?php echo h($user->first_name) ; ?></p>
                    </div>
                </div>

                <div class="field">

                    <label class="label">名</label>
                    <div class="control">
                        <p><?php echo h($user->last_name) ; ?></p>
                    </div>
                </div>

                <div class="field">
                    <label class="label">性別</label>
                    <div class="control">
                        <p><?php echo h($user->sex->name) ; ?></p>
                    </div>
                </div>


                <div class="field">

                    <label class="label">電話番号</label>
                    <div class="control">
                        <p><?php echo h($user->tell) ; ?></p>
                    </div>
                </div>

                <div class="field">

                    <label class="label">メールアドレス</label>
                    <div class="control">
                        <p><?php echo h($user->email) ; ?></p>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <?= $this->Form->button(__('削除する'), ['class' => 'button is-danger del']) ?>
                    </div>
                </div>
                <?= $this->Form->hidden('user_id', ['value' => $user->id]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
