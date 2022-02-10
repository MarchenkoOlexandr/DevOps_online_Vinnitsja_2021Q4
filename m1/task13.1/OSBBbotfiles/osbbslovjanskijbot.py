#!/usr/bin/env python3

# -*- coding: utf-8 -*-
import telebot
import config
#import pyowm
import sys
from importlib import reload
import os

#from pyowm.utils.config import get_default_config
#from pyowm import OWM
#from pyowm.utils import config
#from pyowm.utils import timestamps
#


#config_dict = get_default_config()
#config_dict['language'] = 'ua'

#owm = OWM('f310629780865ca814bdc1abc0a7eba0', config_dict)
# Search for current weather in Vinnitsa (Ukraine)
#mgr = owm.weather_manager()
#observation = mgr.weather_at_place('Vinnytsia,UA')
#w = observation.weather
#tempVin = w.temperature('celsius')['temp']
#neboVin = w.detailed_status

from telebot import types

bot = telebot.TeleBot(config.TOKEN)

@bot.message_handler(commands=['start'])
def welcome(message):

	# keyboard
	markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
	item1 = types.KeyboardButton("Корисні телефони")
	item2 = types.KeyboardButton("Тарифи на комунальні послуги")
	item3 = types.KeyboardButton("Налаштування котла")
#	item4 = types.KeyboardButton("Кнопка 4")
#	item5 = types.KeyboardButton("Кнопка 5")
#	item6 = types.KeyboardButton("Кнопка 6")
	markup.add(item1, item2, item3)
#       markup.add(item4, item5, item6)
	bot.send_message(message.chat.id, "Вітаємо та бажаємо здоров*я, {0.first_name}!\nЯ- <b>{1.first_name}</b>, бот створений, щоб допомогти вам".format(message.from_user, bot.get_me()),
		parse_mode='html', reply_markup=markup)

@bot.message_handler(content_types=['text'])
def lalala(message):
	if message.chat.type == 'private':
		if message.text == 'Корисні телефони':

			bot.send_message(message.chat.id, 'Телефони:\nАВАРІЙНА ЛІФТИ - 0674305971\nДВА КАПІТАНА (під*єднання і ремонт котлів) - 0676042056\nЕЛЕКТРИК ПО БУДИНКУ - Віктор - 0983331101, Олександр - +380985988138\nБУХГАЛТЕР  Галина Олександрівна - 0674324726, 0937881414\nКОНТРОЛЕР ПО ГАЗУ - Наталія - 0672661195\nВОДОКАНАЛ - 0432610600 та 043265111\nСАНТЕХНІК СЛЮСАР Олександр - +380985988138\nПІДКЛЮЧЕННЯ ПЛИТ ГАЗОВИХ ТА ЗВАРЮВАЛЬНІ РОБОТИ Вадим-0639979938\nДОМОФОН:\nУКРДОМСЕРВІС (друга секція)-0979002932\nСТРОЙМАСТЕР (перша секція)-+380689425890\nКамери:\nПрограмма ivms -4500.адреса-79.143.32.22 ,порт-8000, ім*я користувача -  online, пароль - Qwertyui1\nМАЙСТЕР-МЕБЛІ З ГАРАНТІЄЮ - Вадим +380988897008\nМИТТЯ ВІКОН ТА ПРИБИРАННЯ КВАРТИР Ірина - +380962961923 и Катерина - +380965870657\nВСТАНОВЛЕННЯ ДВЕРЕЙ Олег - 0680518608\nВИКОНКОМ ГАРЯЧА ЛІНІЯ-0432601560\nРЕМОНТ ПРАЛЬНИХ МАШИН Юрій - 0972686200, Василь - 0677864173'.format(message.from_user, bot.get_me()),	parse_mode='html')

		if message.text == 'Тарифи на комунальні послуги':

			markup = types.InlineKeyboardMarkup(row_width=3)
			item1 = types.InlineKeyboardButton("Електроенергія", callback_data='elektro')
			item2 = types.InlineKeyboardButton("Водопостачання-водовідведення", callback_data='voda')
			item3 = types.InlineKeyboardButton("Утримання будинку", callback_data='osbb')
			markup.add(item1, item2, item3)

			bot.send_message(message.chat.id, 'Гаразд, оберіть потрібний показник', reply_markup=markup)
		elif message.text == 'Налаштування котла':

#			bot.send_message(message.chat.id, 'Зараз у Вiнницi - ' + str(neboVin) + '\nТемпература повiтря - ' + str(tempVin) + 'по Цельсію')


			bot.send_message(message.chat.id, 'Налаштування котла - необхідно проводити лише тим, хто ознайомився з інструкцією до нього. ВИДАЛИТИ ДЛЯ ПРИКЛАДУ НА ПРЕЗЕНТАЦІЇ')

@bot.callback_query_handler(func=lambda call: True)
def callback_inline(call):
	try:
		if call.message:

			if call.data == 'elektro':

				bot.send_message(call.message.chat.id, 'Електроенергія = 1.44 грн. за кВт')
			if call.data == 'voda':

				bot.send_message(call.message.chat.id, 'Холодна вода = 14.4840 грн. за м3 Водовідведення = 7.4520 грн. за м3 Потребує корегування')
			elif call.data == 'osbb':

				bot.send_message(call.message.chat.id, 'Утримання будинку 3 грн. за м2 загальної площі')

			# remove inline buttons
			#bot.edit_message_text(chat_id=call.message.chat.id, message_id=call.message.message_id, text= 'Надаю потрібну вам інформацію',
			#	reply_markup=None)

			# show alert
			#bot.answer_callback_query(callback_query_id=call.id, show_alert=False,
			#	text="ЭТО ТЕСТОВОЕ УВЕДОМЛЕНИЕ!!11")

	except Exception as e:
		print(repr(e))

# RUN
bot.polling(none_stop=True)
#os.execl(sys.executable, sys.executable, *sys.argv) 
#os.execv(sys.executable, [sys.executable] + sys.argv)
