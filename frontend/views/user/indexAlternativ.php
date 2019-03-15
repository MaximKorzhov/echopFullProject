<div id="DIV_1">
	<div id="DIV_2">
		<div id="DIV_3">
			<div id="DIV_4">
				<!-- ko template: {name: oFolderList.ViewTemplate, data: oFolderList} -->

				<div id="DIV_5">
					 <span id="SPAN_6"><span id="SPAN_7"></span> <span id="SPAN_8">Новое сообщение</span></span> <span id="SPAN_9"><span id="SPAN_10"></span> <span id="SPAN_11">Новая папка</span></span>
				</div>
				<div id="DIV_12">
					<div id="DIV_13">
						<div id="DIV_14">
							<div id="DIV_15">
								<div id="DIV_16">
									<!-- ko template: {name: 'MailWebclient_FolderView', foreach: folderList().collection} -->

									<!-- ko if: visible -->

									<div id="DIV_17">
										<a href="#mail/1925099182/INBOX" id="A_18"></a>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_19">2</span> <span id="SPAN_20"><span id="SPAN_21"></span><span id="SPAN_22"></span> <span id="SPAN_23">Входящие</span></span><span id="SPAN_24"></span>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_25">2</span> <span id="SPAN_26"><span id="SPAN_27"></span><span id="SPAN_28"></span> <span id="SPAN_29">Входящие</span></span>
										<!-- ko if: !bNamespace -->

										<div id="DIV_30">
										</div>
										<!-- /ko -->

									</div>
									<!-- ko if: bNamespace -->

									<!-- /ko -->

									<!-- /ko -->

									<!-- ko if: visible -->

									<div id="DIV_31">
										<a href="#mail/1925099182/INBOX/filter%3Aflagged" id="A_32"></a>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_33">0</span> <span id="SPAN_34"><span id="SPAN_35"></span><span id="SPAN_36"></span> <span id="SPAN_37">Отмеченные</span></span><span id="SPAN_38"></span>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_39">0</span> <span id="SPAN_40"><span id="SPAN_41"></span><span id="SPAN_42"></span> <span id="SPAN_43">Отмеченные</span></span>
										<!-- ko if: !bNamespace -->

										<div id="DIV_44">
										</div>
										<!-- /ko -->

									</div>
									<!-- ko if: bNamespace -->

									<!-- /ko -->

									<!-- /ko -->

									<!-- ko if: visible -->

									<div id="DIV_45">
										<a href="#mail/1925099182/Sent" id="A_46"></a>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_47">0</span> <span id="SPAN_48"><span id="SPAN_49"></span><span id="SPAN_50"></span> <span id="SPAN_51">Отправленные</span></span><span id="SPAN_52"></span>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_53">0</span> <span id="SPAN_54"><span id="SPAN_55"></span><span id="SPAN_56"></span> <span id="SPAN_57">Отправленные</span></span>
										<!-- ko if: !bNamespace -->

										<div id="DIV_58">
										</div>
										<!-- /ko -->

									</div>
									<!-- ko if: bNamespace -->

									<!-- /ko -->

									<!-- /ko -->

									<!-- ko if: visible -->

									<div id="DIV_59">
										<a href="#mail/1925099182/Drafts" id="A_60"></a>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_61">0</span> <span id="SPAN_62"><span id="SPAN_63"></span><span id="SPAN_64"></span> <span id="SPAN_65">Черновики</span></span><span id="SPAN_66"></span>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_67">0</span> <span id="SPAN_68"><span id="SPAN_69"></span><span id="SPAN_70"></span> <span id="SPAN_71">Черновики</span></span>
										<!-- ko if: !bNamespace -->

										<div id="DIV_72">
										</div>
										<!-- /ko -->

									</div>
									<!-- ko if: bNamespace -->

									<!-- /ko -->

									<!-- /ko -->

									<!-- ko if: visible -->

									<div id="DIV_73">
										<a href="#mail/1925099182/Spam" id="A_74"></a>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_75">0</span> <span id="SPAN_76"><span id="SPAN_77"></span><span id="SPAN_78"></span> <span id="SPAN_79">Спам</span></span><span id="SPAN_80"></span>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_81">0</span> <span id="SPAN_82"><span id="SPAN_83"></span><span id="SPAN_84"></span> <span id="SPAN_85">Спам</span></span>
										<!-- ko if: !bNamespace -->

										<div id="DIV_86">
										</div>
										<!-- /ko -->

									</div>
									<!-- ko if: bNamespace -->

									<!-- /ko -->

									<!-- /ko -->

									<!-- ko if: visible -->

									<div id="DIV_87">
										<a href="#mail/1925099182/Trash" id="A_88"></a>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_89">0</span> <span id="SPAN_90"><span id="SPAN_91"></span><span id="SPAN_92"></span> <span id="SPAN_93">Корзина</span></span><span id="SPAN_94"></span>
										<!-- ko if: showMessagesCount -->

										<!-- /ko -->
 <span id="SPAN_95">0</span> <span id="SPAN_96"><span id="SPAN_97"></span><span id="SPAN_98"></span> <span id="SPAN_99">Корзина</span></span>
										<!-- ko if: !bNamespace -->

										<div id="DIV_100">
										</div>
										<!-- /ko -->

									</div>
									<!-- ko if: bNamespace -->

									<!-- /ko -->

									<!-- /ko -->

									<!-- /ko -->

								</div>
							</div>
						</div>
						<div id="DIV_101">
							<div id="DIV_102">
							</div>
						</div>
					</div>
					<div id="DIV_103">
						<div id="DIV_104">
							 <a href="#settings/mail-accounts/account/1925099182/folders" id="A_105">Настройка папок</a>
						</div> <span id="SPAN_106"> <span id="SPAN_107"><span id="SPAN_108"></span></span></span>
					</div>
				</div>
				<!-- /ko -->

			</div>
		</div>
		<div id="DIV_109">
			<div id="DIV_110">
			</div>
		</div>
		<div id="DIV_111">
			<div id="DIV_112">
				<!-- ko template: { name: 'MailWebclient_Messages_ToolbarView' } -->

				<div id="DIV_113">
					<span id="SPAN_114"></span> <span id="SPAN_115"> <span id="SPAN_116"><span id="SPAN_117"></span> <span id="SPAN_118">Проверить почту</span></span></span>
					<!-- ko template: {name: 'MailWebclient_Messages_MarkButtonView'} -->
 <span id="SPAN_119"> <span id="SPAN_120"><span id="SPAN_121"></span> <span id="SPAN_122">Пометить прочитанным</span></span> <span id="SPAN_123"><span id="SPAN_124"></span> <span id="SPAN_125"> <span id="SPAN_126"> <span id="SPAN_127"><span id="SPAN_128"></span></span> <span id="SPAN_129"> <span id="SPAN_130">Пометить все письма прочитанными</span> <span id="SPAN_131">Пометить непрочитанным</span></span></span></span></span></span>
					<!-- /ko -->
 <span id="SPAN_132"><span id="SPAN_133"></span> <span id="SPAN_134">Переместить в папку</span><span id="SPAN_135"></span> <span id="SPAN_136"> <span id="SPAN_137"> <span id="SPAN_138"><span id="SPAN_139"></span></span> <span id="SPAN_140"><span id="SPAN_141"></span></span></span></span></span>
					<!-- ko template: {name: 'MailWebclient_MoveToFolderView', foreach: folderList().collection} -->
 <span id="SPAN_142"> <span id="SPAN_143"> <span id="SPAN_144">Входящие</span></span></span>
					<!-- ko if: !bNamespace -->
<span id="SPAN_145"></span>
					<!-- /ko -->

					<!-- ko if: bNamespace -->

					<!-- /ko -->
 <span id="SPAN_146"> <span id="SPAN_147"> <span id="SPAN_148">Отмеченные</span></span></span>
					<!-- ko if: !bNamespace -->
<span id="SPAN_149"></span>
					<!-- /ko -->

					<!-- ko if: bNamespace -->

					<!-- /ko -->
 <span id="SPAN_150"> <span id="SPAN_151"> <span id="SPAN_152">Отправленные</span></span></span>
					<!-- ko if: !bNamespace -->
<span id="SPAN_153"></span>
					<!-- /ko -->

					<!-- ko if: bNamespace -->

					<!-- /ko -->
 <span id="SPAN_154"> <span id="SPAN_155"> <span id="SPAN_156">Черновики</span></span></span>
					<!-- ko if: !bNamespace -->
<span id="SPAN_157"></span>
					<!-- /ko -->

					<!-- ko if: bNamespace -->

					<!-- /ko -->
 <span id="SPAN_158"> <span id="SPAN_159"> <span id="SPAN_160">Спам</span></span></span>
					<!-- ko if: !bNamespace -->
<span id="SPAN_161"></span>
					<!-- /ko -->

					<!-- ko if: bNamespace -->

					<!-- /ko -->
 <span id="SPAN_162"> <span id="SPAN_163"> <span id="SPAN_164">Корзина</span></span></span>
					<!-- ko if: !bNamespace -->
<span id="SPAN_165"></span>
					<!-- /ko -->

					<!-- ko if: bNamespace -->

					<!-- /ko -->

					<!-- /ko -->

					<div id="DIV_166">
						<div id="DIV_167">
						</div>
					</div>
					<!-- ko template: {name: 'MailWebclient_Messages_DeleteButtonView'} -->
 <span id="SPAN_168"><span id="SPAN_169"></span> <span id="SPAN_170">Удалить</span> <span>0" style="display: none;" id="SPAN_171">0</span></span>
					<!-- /ko -->
 <span id="SPAN_172"><span id="SPAN_173"></span> <span id="SPAN_174">Очистить корзину</span></span> <span id="SPAN_175"><span id="SPAN_176"></span> <span id="SPAN_177">Очистить спам</span></span>
					<!-- ko template: {name: 'MailWebclient_Messages_SpamButtonsView'} -->
 <span id="SPAN_178"><span id="SPAN_179"></span> <span id="SPAN_180">Спам</span></span> <span id="SPAN_181"><span id="SPAN_182"></span> <span id="SPAN_183">Не спам</span></span>
					<!-- /ko -->

				</div>
				<!-- /ko -->

				<!-- ko template: { name: oMessageList.ViewTemplate, data: oMessageList} -->

				<div id="DIV_184">
					<div id="DIV_185">
						 
						<label id="LABEL_186">
							<span id="SPAN_187"></span>
							<input type="checkbox" id="INPUT_188" />
						</label>
						<!-- ko template: {name: 'MailWebclient_SearchView'} -->
 <span id="SPAN_189"> <span id="SPAN_190"><span id="SPAN_191"></span>
								<input type="text" id="INPUT_192" /></span></span>
						<div id="DIV_193">
						</div>
						<div id="DIV_194">
							 <span id="SPAN_195"> <span id="SPAN_196"> <span>0}" id="SPAN_197"> 
										<label for="search_from" id="LABEL_198">
											От
										</label>
										<input id="INPUT_199" type="text" /></span> <span>0}" id="SPAN_200"> 
										<label for="search_subject" id="LABEL_201">
											Тема
										</label>
										<input id="INPUT_202" type="text" /></span> <span id="SPAN_203"> <span>0}" id="SPAN_204"> 
											<label for="search_date_start" id="LABEL_205">
												После
											</label>
											<input id="INPUT_206" type="text" /></span></span></span> <span id="SPAN_207"> <span>0}" id="SPAN_208"> 
										<label for="search_to" id="LABEL_209">
											Кому
										</label>
										<input id="INPUT_210" type="text" /></span> <span>0}" id="SPAN_211"> 
										<label for="search_text" id="LABEL_212">
											Текст
										</label>
										<input id="INPUT_213" type="text" /></span> <span id="SPAN_214"> <span>0}" id="SPAN_215"> 
											<label for="search_date_end" id="LABEL_216">
												До
											</label>
											<input id="INPUT_217" type="text" /></span></span></span> <span id="SPAN_218"> <span>0}" id="SPAN_219"> 
										<label id="LABEL_220">
											<span id="SPAN_221"></span>
											<input id="INPUT_222" type="checkbox" />
										</label> <span id="SPAN_223"> 
											<label for="search_attachments" id="LABEL_224">
												С вложениями
											</label>
											<input id="INPUT_225" type="text" /></span></span></span></span>
							<div id="DIV_226">
								 <span id="SPAN_227">Поиск</span>
							</div>
						</div> <span id="SPAN_228"><span id="SPAN_229"></span></span>
						<!-- /ko -->

					</div>
					<div id="DIV_230">
						<div id="DIV_231">
							<div id="DIV_232">
								 <span id="SPAN_233"> <span id="SPAN_234"> <span id="SPAN_235">Прекратить поиск</span> <span id="SPAN_236">Результаты поиска<span id="SPAN_237"></span> в папке Входящие:</span></span> <span id="SPAN_238"> <span id="SPAN_239">Отменить поиск</span> <span id="SPAN_240">Результаты поиска<span id="SPAN_241"></span> в папке Входящие:</span></span> <span id="SPAN_242"> <span id="SPAN_243">Отменить поиск</span> <span id="SPAN_244">Ни одно сообщение не найдено.</span></span> <span id="SPAN_245"> <span id="SPAN_246">Повторить</span> <span id="SPAN_247">Вернуться в список сообщений</span> <span id="SPAN_248">Во время поиска произошла ошибка</span></span> <span id="SPAN_249"> <span id="SPAN_250">Посмотреть все сообщения</span> <span id="SPAN_251">Непрочитанные сообщения в папке Входящие:</span></span> <span id="SPAN_252"> <span id="SPAN_253">Посмотреть все сообщения</span> <span id="SPAN_254">У вас нет непрочитанных сообщений</span></span> <span id="SPAN_255"> <span id="SPAN_256">В папке нет сообщений</span></span> <span id="SPAN_257"> <span id="SPAN_258">У вас нет отмеченных сообщений.</span></span> <span id="SPAN_259"> <span id="SPAN_260">Повторить</span> <span id="SPAN_261">При получении списка сообщений произошла ошибка</span></span></span>
								<div id="DIV_262">
									<!-- ko template: {name: $parent.customMessageItemViewTemplate() || 'MailWebclient_MessageItemView'} -->

									<div id="DIV_263">
										<div id="DIV_264">
											 <span id="SPAN_265"> <span id="SPAN_266"><span id="SPAN_267"></span></span><span id="SPAN_268"></span><span id="SPAN_269"></span></span> <span id="SPAN_270"> <span id="SPAN_271">307KB</span> <span id="SPAN_272">21:26</span><span id="SPAN_273"></span><span id="SPAN_274"></span> <span id="SPAN_275"> <span id="SPAN_276">я</span></span><span id="SPAN_277"></span> <span>0}, customTooltip: threadCountHint" style="display: none;" id="SPAN_278">0</span> <span id="SPAN_279">Загрузка...</span> <span id="SPAN_280"><span id="SPAN_281"></span> <span id="SPAN_282">Welcome to WebMail Lite 8 Demo Account</span></span></span>
											<div id="DIV_283">
											</div>
										</div>
									</div>
									<!-- ko if: threadNextLoadingVisible() -->

									<!-- /ko -->

									<!-- /ko -->

									<!-- ko template: {name: $parent.customMessageItemViewTemplate() || 'MailWebclient_MessageItemView'} -->

									<div id="DIV_284">
										<div id="DIV_285">
											 <span id="SPAN_286"> <span id="SPAN_287"><span id="SPAN_288"></span></span><span id="SPAN_289"></span><span id="SPAN_290"></span></span> <span id="SPAN_291"> <span id="SPAN_292">15KB</span> <span id="SPAN_293">21:26</span><span id="SPAN_294"></span><span id="SPAN_295"></span> <span id="SPAN_296"> <span id="SPAN_297">я</span></span><span id="SPAN_298"></span> <span>0}, customTooltip: threadCountHint" style="display: none;" id="SPAN_299">0</span> <span id="SPAN_300">Загрузка...</span> <span id="SPAN_301"><span id="SPAN_302"></span> <span id="SPAN_303">What is this about?</span></span></span>
											<div id="DIV_304">
											</div>
										</div>
									</div>
									<!-- ko if: threadNextLoadingVisible() -->

									<!-- /ko -->

									<!-- /ko -->

									<!-- ko template: {name: $parent.customMessageItemViewTemplate() || 'MailWebclient_MessageItemView'} -->

									<div id="DIV_305">
										<div id="DIV_306">
											 <span id="SPAN_307"> <span id="SPAN_308"><span id="SPAN_309"></span></span><span id="SPAN_310"></span><span id="SPAN_311"></span></span> <span id="SPAN_312"> <span id="SPAN_313">14KB</span> <span id="SPAN_314">21:26</span><span id="SPAN_315"></span><span id="SPAN_316"></span> <span id="SPAN_317"> <span id="SPAN_318">я</span></span><span id="SPAN_319"></span> <span>0}, customTooltip: threadCountHint" style="display: none;" id="SPAN_320">0</span> <span id="SPAN_321">Загрузка...</span> <span id="SPAN_322"><span id="SPAN_323"></span> <span id="SPAN_324">Good guy in your network family</span></span></span>
											<div id="DIV_325">
											</div>
										</div>
									</div>
									<!-- ko if: threadNextLoadingVisible() -->

									<!-- /ko -->

									<!-- /ko -->

								</div> <span id="SPAN_326"> <span id="SPAN_327">Подождите, пока WebMail загрузит список сообщений...</span></span> <span id="SPAN_328"> <span id="SPAN_329">Поиск сообщений</span></span>
								<div id="DIV_330">
									<div id="DIV_331">
									</div>
								</div>
							</div>
						</div>
						<div id="DIV_332">
							<div id="DIV_333">
							</div>
						</div>
					</div>
					<div>
						0, template: {name: oPageSwitcher.ViewTemplate, data: oPageSwitcher}" style="display: none;" id="DIV_334"> <span>0" style="display: none;" id="SPAN_335"><span id="SPAN_336"></span><span id="SPAN_337"></span><span id="SPAN_338"></span><span id="SPAN_339"></span><span id="SPAN_340"></span></span>
					</div>
				</div>
				<!-- /ko -->

			</div>
		</div>
		<div id="DIV_341">
			<div id="DIV_342">
			</div>
		</div>
		<div id="DIV_343">
			<div id="DIV_344">
				<div id="DIV_345">
					<div id="DIV_346">
						 <span id="SPAN_347"><span id="SPAN_348"></span></span>
						<div id="DIV_349">
							 <span id="SPAN_350"> <span id="SPAN_351">Изображения в сообщении блокированы из соображений безопасности.</span> <span id="SPAN_352">Показать изображения</span></span> <span id="SPAN_353"> <span id="SPAN_354">Всегда показывать изображения в сообщениях от данного отправителя</span></span>
						</div>
						<div id="DIV_355">
							 <span id="SPAN_356">Отправитель этого письма запрашивает подтверждения получения сообщения.</span> <span id="SPAN_357">Нажмите здесь, чтобы отправить подтверждение.</span>
						</div>
						<!-- ko foreach: topControllers -->

						<!-- ko if: $data.ViewTemplate -->

						<!-- ko template: { name: $data.ViewTemplate, data: $data} -->

						<div id="DIV_358">
							<span id="SPAN_359"></span>
						</div>
						<!-- /ko -->

						<!-- /ko -->

						<!-- ko if: $data.ViewTemplate -->

						<!-- ko template: { name: $data.ViewTemplate, data: $data} -->

						<div id="DIV_360">
							 <span id="SPAN_361">Это сообщение зашифровано с помощью OpenPGP.</span> <span id="SPAN_362">Введите свой пароль</span>
							<input type="password" id="INPUT_363" /> <span id="SPAN_364">Нажмите для дешифрования.</span>
						</div>
						<div id="DIV_365">
							 <span id="SPAN_366">Это сообщение подписано с помощью OpenPGP.</span> <span id="SPAN_367">Нажмите для верификации.</span>
						</div>
						<!-- /ko -->

						<!-- /ko -->

						<!-- /ko -->

						<div id="DIV_368">
							<div id="DIV_369">
								<!-- ko template: {name: 'MailWebclient_Message_ToolbarView'} -->

								<div id="DIV_370">
									 <span id="SPAN_371"> <span id="SPAN_372"><span id="SPAN_373"></span> <span id="SPAN_374">Удалить</span></span> <span id="SPAN_375"><span id="SPAN_376"></span> <span id="SPAN_377">Следующее сообщение</span></span> <span id="SPAN_378"><span id="SPAN_379"></span> <span id="SPAN_380">Предыдущее сообщение</span></span></span>
									<!-- ko template: {name: 'MailWebclient_Message_ReplyButtonsView'} -->
 <span id="SPAN_381"><span id="SPAN_382"></span> <span id="SPAN_383">Ответить</span></span> <span id="SPAN_384"><span id="SPAN_385"></span> <span id="SPAN_386">Ответить всем</span></span>
									<!-- /ko -->
 <span id="SPAN_387"><span id="SPAN_388"></span> <span id="SPAN_389">Повторить</span></span>
									<!-- ko template: {name: 'MailWebclient_Message_ForwardButtonView'} -->
 <span id="SPAN_390"><span id="SPAN_391"></span> <span id="SPAN_392">Переслать</span></span>
									<!-- /ko -->
 <a href="javascript: void(0);" id="A_393"><span id="SPAN_394"></span> <span id="SPAN_395">Открыть в новом окне</span></a> <span id="SPAN_396"><span id="SPAN_397"></span> <span id="SPAN_398">Ещё</span> <span id="SPAN_399"> <span id="SPAN_400"> <span id="SPAN_401"><span id="SPAN_402"></span></span> <span id="SPAN_403"> <span id="SPAN_404"><span id="SPAN_405"></span> <span id="SPAN_406">Печать</span></span> <span id="SPAN_407"><span id="SPAN_408"></span> <span id="SPAN_409">Скачать .eml</span></span> <span id="SPAN_410"><span id="SPAN_411"></span> <span id="SPAN_412">Переслать как вложение</span></span> <span id="SPAN_413"><span id="SPAN_414"></span> <span id="SPAN_415">Посмотреть заголовки сообщения</span></span></span></span></span></span>
									<!-- ko foreach: moreSectionCommands -->

									<!-- /ko -->

								</div>
								<!-- /ko -->

								<div id="DIV_416">
									<div id="DIV_417">
										 <span id="SPAN_418"> <span id="SPAN_419">я</span><span id="SPAN_420"></span></span> <span>0" style="" id="SPAN_421">→</span> <span id="SPAN_422"> <span id="SPAN_423"> <span id="SPAN_424">мне</span><span id="SPAN_425"></span></span></span>
									</div>
								</div>
								<div id="DIV_426">
									<div id="DIV_427">
										 <span id="SPAN_428">От</span>: <span id="SPAN_429"> <span id="SPAN_430">Webmail Demo &lt;user87959@demo.afterlogic.com&gt;</span><span id="SPAN_431"></span></span>
									</div>
									<div>
										0" style="" id="DIV_432"> <span id="SPAN_433">Кому</span>:
										<!-- ko foreach: aToAddr -->
 <span id="SPAN_434"> <span id="SPAN_435">user87959@demo.afterlogic.com</span><span id="SPAN_436"></span></span>
										<!-- /ko -->

									</div>
									<div>
										0" style="display: none;" id="DIV_437"> <span id="SPAN_438">Копии</span>:
										<!-- ko foreach: aCcAddr -->

										<!-- /ko -->

									</div>
									<div>
										0" style="display: none;" id="DIV_439"> <span id="SPAN_440">Скрытые копии</span>:
										<!-- ko foreach: aBccAddr -->

										<!-- /ko -->

									</div>
									<div id="DIV_441">
										 <span id="SPAN_442">Дата</span>: <span id="SPAN_443">чт, март 14, 2019 21:26</span>
									</div>
								</div>
							</div>
							<div id="DIV_444">
								 <span id="SPAN_445">21:26</span><span id="SPAN_446"></span>
								<h2 id="H2_447">
									Welcome to WebMail Lite 8 Demo Account
								</h2>
								<h2 id="H2_448">
									Welcome to WebMail Lite 8 Demo Account
								</h2>
							</div>
						</div>
						<!-- ko template: {name: sAttachmentsSwitcherViewTemplate} -->

						<!-- /ko -->

					</div>
					<div id="DIV_449">
						<div id="DIV_450">
							<div id="DIV_451">
								<div id="DIV_452">
									<div id="DIV_453">
										<!-- ko foreach: bodyControllers -->

										<!-- ko if: $data.ViewTemplate -->

										<!-- ko template: { name: $data.ViewTemplate, data: $data} -->

										<div id="DIV_454">
										</div>
										<!-- /ko -->

										<!-- /ko -->

										<!-- /ko -->

										<div id="DIV_455">
											<div id="DIV_456">
												Сообщение не выбрано.
											</div>
											<div id="DIV_457">
												Нажмите на сообщение для того, чтобы просмотреть его здесь, или нажмите дважды для открытия в отдельном окне.
											</div>
										</div>
										<div id="DIV_458">
											Загрузка...
										</div>
										<div id="DIV_459">
											<div id="DIV_460">
												<div id="DIV_461">
													<div id="DIV_462">
														<div id="DIV_463">
															<table id="TABLE_464">
																<tbody id="TBODY_465">
																	<tr id="TR_466">
																		<td id="TD_467">
																			<br id="BR_468" /><img src="?mail-attachment/t-nCKjy-i_6shaYHVmo_4aRFgP-2__tF6RcDAPYAqyC7SITyz8-0nWXPEhc85Igrvzfj1tAaImGRSDoG8dbWBIUQwucqKBi9qUwTVZKG2qZGWfCHy3EyEtU1Lcnbp_CnIqU8V_SlCLAyf-LmDh4kQQlINNmtN8nn4CqkD57WxcG9F_gShj8tzhQC0ewv1ilMsVjtvgOIXpeYWiYz37u4Y0I7BOQL_V0s/view" id="IMG_469" alt='' /><img src="?mail-attachment/gI8enPdXmS_lP8pdrvqwYdgbDS1YLbiL5lEWkmbBpwRJWHnWJ4_Jx0zG5VEec0vIERiNNLgIDE19C7SLUZkLzRLQU_74TWHPpCZ_yfbXq2fjaNTsTuiuZ9eTe1czfpKS-bg105PnF1FHIyTmziZEyPjTMraWeYCHr1QGnkBbnbfuES2xNylgqhgIX_yA-0CG8FHHuKrK_WBoWt7JbgDlXYt8N86oF2jXuHREuw/view" id="IMG_470" alt='' />Hi there! We hope you enjoy this webmail frontend as we here at Afterlogic, do.<br id="BR_472" /><br id="BR_473" /> Please feel free to click, tap and drag-n-drop everything around. :)<br id="BR_474" /><br id="BR_475" /> However, please note with this demo you can send emails to this demo email account only. It's just not to allow folks to send spam from here.<br id="BR_476" /><br id="BR_477" /> Should you find that you need some help with getting this thing to work on your network, here are your options:<br id="BR_478" />
																			<ul id="UL_479">
																				<li id="LI_480">
																					<a href="https://afterlogic.com/docs/webmail-lite-8" tabindex="-1" rel="external" id="A_481">Documentation</a>, which should be your starting point
																				</li>
																				<li id="LI_482">
																					We appreciate your feedback at our public <a href="https://github.com/afterlogic/aurora-platform/issues" tabindex="-1" rel="external" id="A_483">Issue tracker</a> on GitHub.
																				</li>
																			</ul> Also don't forget to get in touch with us at <a href="http://www.facebook.com/afterlogic" tabindex="-1" rel="external" id="A_485">Facebook</a> and <a href="https://twitter.com/afterlogic" tabindex="-1" rel="external" id="A_486">Twitter</a>.<br id="BR_487" /> For those of you who are Big Guys, and should require dedicated support and the team behind the product, please call us <a href="javascript:void(0)" tabindex="-1" id="A_488">+1-973-784-1100</a> or just drop us a message <a href="http://www.afterlogic.com/contact" tabindex="-1" rel="external" id="A_489">here</a>.
																		</td>
																	</tr>
																	<tr id="TR_491">
																		<td id="TD_492">
																			<br id="BR_493" /> Love,<br id="BR_494" /> WebMail Support Team,<br id="BR_495" /> Afterlogic Corp.<br id="BR_496" /><br id="BR_497" />
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="DIV_499">
										<div id="DIV_500">
										</div>
									</div>
									<div id="DIV_501">
										<div id="DIV_502">
										</div>
									</div>
								</div>
							</div>
							<div id="DIV_503">
								<div id="DIV_504">
									<div id="DIV_505">
										<div id="DIV_506">
											 <span id="SPAN_507"><span id="SPAN_508"></span> <span id="SPAN_509">Скачать все вложения...</span></span>
											<div id="DIV_510">
												 <span id="SPAN_511"><span id="SPAN_512"></span> <span id="SPAN_513">...по отдельности</span></span>
												<!-- ko foreach: allAttachmentsDownloadMethods -->
 <span id="SPAN_514"><span id="SPAN_515"></span> <span id="SPAN_516">...как архив</span></span>
												<!-- /ko -->

											</div>
										</div>
										<div id="DIV_517">
										</div>
									</div>
								</div>
								<div id="DIV_518">
									<div id="DIV_519">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="DIV_520">
						<!-- ko template: {name: sQuickReplyViewTemplate} -->

						<div id="DIV_521">
							<div id="DIV_522">
								<div id="DIV_523">
								</div>
							</div>
							<div>
								0}" id="DIV_524"> 
								<label for="reply_text" id="LABEL_525">
									Быстрый ответ
								</label>
								<textarea id="TEXTAREA_526">
								</textarea>
							</div>
							<div id="DIV_527">
								 <span id="SPAN_528">Отправить</span> <span id="SPAN_529">Сохранить</span> <span id="SPAN_530">Ctrl+Enter для отправки</span> <a href="javascript: void(0);" id="A_531">Открыть полную форму ответа</a>
							</div>
						</div>
						<!-- /ko -->

					</div>
					<!-- ko template: {name: 'MailWebclient_PrintMessageView'} -->

					<div id="DIV_532">
						<style id="STYLE_533">pre { white-space: pre-wrap; word-wrap: break-word; } blockquote {/*while editing see also style.css*/ border-left: solid 2px #000000; margin: 4px 2px; padding-left: 6px; } .wm_print_document { padding-top: 10px; max-width: 800px; } .wm_print { border-collapse: collapse; width: 96%; } .wm_print_title, .wm_print_value, .wm_print_body { padding: 4px; border: solid #666666; font: normal 11px Tahoma, Arial, Helvetica, sans-serif; text-align: left; } .wm_print_title { border-width: 0px 1px 1px 0px !important; } .wm_print_value { border-width: 0px 0px 1px 1px !important; } .wm_print_body { border-width: 1px 0px 0px 0px !important; } .wm_print_body div:first-child { display: block; max-width: 800px; text-align: left; padding-top: 10px; } span.comma:first-child { display: none; }
						</style>
						<div id="DIV_534">
								<table id="TABLE_535">
									<tbody id="TBODY_536">
										<tr id="TR_537">
											<td id="TD_538">
												 <span id="SPAN_539">От</span>:
											</td>
											<td colspan="2" id="TD_540">
												Webmail Demo &lt;user87959@demo.afterlogic.com&gt;
											</td>
										</tr>
										<tr id="TR_541">
											<td id="TD_542">
												 <span id="SPAN_543">Кому</span>:
											</td>
											<td colspan="2" id="TD_544">
												user87959@demo.afterlogic.com
											</td>
										</tr>
										<tr id="TR_545">
											<td id="TD_546">
												 <span id="SPAN_547">Копии</span>:
											</td>
											<td colspan="2" id="TD_548">
											</td>
										</tr>
										<tr id="TR_549">
											<td id="TD_550">
												 <span id="SPAN_551">Скрытые копии</span>:
											</td>
											<td colspan="2" id="TD_552">
											</td>
										</tr>
										<tr id="TR_553">
											<td id="TD_554">
												 <span id="SPAN_555">Дата</span>:
											</td>
											<td colspan="2" id="TD_556">
												чт, март 14, 2019 21:26
											</td>
										</tr>
										<tr id="TR_557">
											<td id="TD_558">
												 <span id="SPAN_559">Тема</span>:
											</td>
											<td colspan="2" id="TD_560">
												Welcome to WebMail Lite 8 Demo Account
											</td>
										</tr>
										<!-- ko if: $data.notInlineAttachments -->

										<!-- View is used for message print in message pane. -->

										<tr>
											0" style="display: none;" id="TR_561">
											<td id="TD_562">
												 <span id="SPAN_563">Вложения</span>:
											</td>
											<td colspan="2" id="TD_564">
												<span id="SPAN_565"></span>
											</td>
										</tr>
										<!-- /ko -->

										<!-- ko if: !$data.notInlineAttachments -->

										<!-- /ko -->

										<tr id="TR_566">
											<td colspan="3" id="TD_567">
												<div id="DIV_568">
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
					</div>
					<!-- /ko -->

				</div>
			</div>
		</div>
	</div>
</div>